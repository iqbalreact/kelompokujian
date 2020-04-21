<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelompok;
use App\Ruangan;
use App\Student;
use App\Teacher;
use DB;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RuanganController extends Controller
{
    //get token
    public function getToken() {

        $email = 'aplikasi@pantaudaring.untan.ac.id';
        $password = 'pantauterus';
        
        $client = new Client();

        $response = $client->request('POST', 'http://203.24.51.52:4740/api/login', [
            'form_params' => [
                'email' => $email,
                'password' => $password,
            ]
        ]);
        
        $coursetoken = $response->getBody();
        $courseDetail = json_decode($coursetoken, true);
        $token = $courseDetail['token'];
        $this->getToken = $token;
        
    }

    public function setHeader() {
        $get = $this->getToken();
        $token = $this->getToken;

        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);

        $this->auth = $client;

    }

    //course
    public function index()
    {      
        $ruangans = DB::table('ruangans')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('ruangans.*', 'kelompoks.nama_kelompok')
        ->orderBy('nama_kelompok')
        ->get();
        
        return view ('pages.ruangan', compact('ruangans'));
    }

    //detail course
    public function courseDetail($id)
    {
        $ruangans = DB::table('ruangans')
        ->join('kelompoks', 'ruangans.kelompok_id', '=', 'kelompoks.id')
        ->select('ruangans.*', 'kelompoks.nama_kelompok')->where('courseId',$id)->get();

        $students = DB::table('students')->where('courseId',$id)->get();
        $teachers = DB::table('teachers')->where('courseId',$id)->get();
        // dd($students);
        return view ('pages.detail-ruangan', compact('ruangans', 'students','teachers'));    

    }
    //add course
    public function addCourse()
    {
        $kelompoks = Kelompok::All(); 
        return view ('add.tambahruangan', compact('kelompoks'));

    }

    public function storeCourse(Request $course)
    {
        $kelompok_id = $course->kelompok_id;
        $name = $course->name;
        $ownerId = $course->ownerId;
        $description = $course->description;
        $descriptionHeading = $course->descriptionHeading;
        $section = $course->section;

        $getAuth = $this->setHeader();
        $client = $this->auth;

        $response = $client->request('POST', 'http://203.24.51.52:4740/api/classroom/createcourse', [
            'form_params' => [
                'name' => $name,
                'ownerId' => $ownerId,
                'description' => $description,
                'descriptionHeading' => $descriptionHeading,
                'section' => $section,
            ]
        ]);

        $courseCreate = $response->getBody();
        //decode
        $courseDetail = json_decode($courseCreate, true);
        //get detail item
        $courseId = $courseDetail['data']['id'];
        $courseName = $courseDetail['data']['name'];
        $courseName = $courseDetail['data']['name'];
        $courseState = $courseDetail['data']['courseState'];
        $enrollmentCode = $courseDetail['data']['enrollmentCode'];
        $courseLink = $courseDetail['data']['alternateLink'];

        //save to db
        $course = new Ruangan;
        $course->kelompok_id = $kelompok_id;
        $course->courseId = $courseId;
        $course->ownerId = $ownerId;
        $course->courseName = $courseName;
        $course->courseState = $courseState;
        $course->enrollmentCode = $enrollmentCode;
        $course->courseLink = $courseLink;
        $course->save();
        return redirect('/admin/course')->with('success', 'Berhasil Menambahkan Ruangan Kelas');

    }

    public function editCourse($courseId)
    {
        $kelompoks = Kelompok::All(); 

        $getAuth = $this->setHeader();
        $client = $this->auth;

        $response = $client->request('GET', 'http://203.24.51.52:4740/api/classroom/getcourse/'.$courseId);
        $courseDetail = $response->getBody()->getContents();
        $courseDecode = json_decode($courseDetail, true);
        $details = $courseDecode;
        // dd($details);
        return view ('add.editruangan', compact('details', 'kelompoks'));
    }


    public function updateCourse(Request $course)
    {
        // dd($course);
        $kelompok_id = $course->kelompok_id;
        $name = $course->name;
        $ownerId = $course->ownerId;
        $description = $course->description;
        $descriptionHeading = $course->descriptionHeading;
        $section = $course->section;
        $id = $course->id;

        $getAuth = $this->setHeader();
        $client = $this->auth;

        $response = $client->request('POST', 'http://203.24.51.52:4740/api/classroom/updatecourse/', [
            'form_params' => [
                'name' => $name,
                'ownerId' => $ownerId,
                'description' => $description,
                'descriptionHeading' => $descriptionHeading,
                'section' => $section,
                'id' => $id,
            ]
        ]);
        $courseUpdate = $response->getBody();
        // echo $courseUpdate;

        $courseDetail = json_decode($courseUpdate, true);
        //get detail item
        $courseId = $courseDetail['data']['id'];
        $courseName = $courseDetail['data']['name'];
        $courseLink = $courseDetail['data']['alternateLink'];

        DB::table('ruangans')->where('courseId',$courseId)->update([
            'kelompok_id' => $kelompok_id,
            'courseName' => $courseName,
            'courseLink' => $courseLink,
        ]);

        return redirect('/admin/course');
    }

    public function archiveCourse(Request $courseId)
    {

        $id = $courseId->id;
        
        $getAuth = $this->setHeader();
        $client = $this->auth;

        $response = $client->request('POST', 'http://203.24.51.52:4740/api/classroom/arsipkanCourse', [
            'form_params' => [
                'id' => $id,
            ]
        ]);

        $courseArchived = $response->getBody();
        $courseDetail = json_decode($courseArchived, true);
        //get detail item
        $courseId = $courseDetail['data']['id'];
        $courseDelete = Ruangan::where('courseId', $courseId)->first();
        $courseDelete->delete();

        return redirect('/admin/course');

    }


    //active room
    public function activeRoom($courseId)
    {
        $getAuth = $this->setHeader();
        $client = $this->auth;

        $id = $courseId;

        $response = $client->request('POST', 'http://203.24.51.52:4740/api/classroom/aktifkanCourse', [
            'form_params' => [
                'id' => $id,
            ]
        ]);
        $courseActive = $response->getBody();
        $courseDetail = json_decode($courseActive, true);
        //get detail item
        $courseState = $courseDetail['data']['courseState'];
        
        DB::table('ruangans')->where('courseId',$courseId)->update([
            'courseState' => $courseState,
        ]);

        return redirect()->back();


    }


    //techer course
    public function teacher($courseId)
    {
        $id = $courseId;
        return view ('add.tambahteacher', compact('id'));
    }

    public function addTeacher(Request $course)
    {   
        
    }


    public function deleteTeacher()
    {

    }



    //student course
    public function student($courseId)
    {   
       $id = $courseId;
        return view ('add.tambahstudent', compact('id'));
    }

    public function addStudent(Request $course)
    {

        $courseId = $course->courseId;
        $userId = $course->userId;

        $getAuth = $this->setHeader();
        $client = $this->auth;

        $response = $client->request('POST', 'http://203.24.51.52:4740/api/classroom/addstudent', [
            'form_params' => [
                'courseId' => $courseId,
                'userId' => $userId,
            ]
        ]);
        $courseAddStudent = $response->getBody();
        // echo $courseAddStudent;
        //decode
        $courseDetail = json_decode($courseAddStudent, true);
        //get detail item
        $studentName = $courseDetail['data']['nama_lengkap'];

        //save to db
        $course = new Student;
        $course->courseId = $courseId;
        $course->studentId = $userId;
        $course->nameStudent = $studentName;
        $course->save();
        $students = DB::table('students')->where('courseId',$course)->get();
        return redirect()->back();
        // return redirect('admin/course')->with('success', 'Berhasil Menambahkan Anggota');

    }

    public function deleteStudent(Request $course)
    {
        $courseId = $course->courseId;
        $userId = $course->userId;
        
        $getAuth = $this->setHeader();
        $client = $this->auth;

        $response = $client->request('POST', 'http://203.24.51.52:4740/api/classroom/deletestudent', [
            'form_params' => [
                'courseId' => $courseId,
                'userId' => $userId,
            ]
        ]);
        $courseArchived = $response->getBody();
        // echo $courseArchived;
        $courseDetail = json_decode($courseArchived, true);
        // echo $courseDetail;
        $courseDelete = Student::where('courseId', $courseId)->where('studentId', $userId)->first();
        $courseDelete->delete();
        return redirect()->back();
    }



}