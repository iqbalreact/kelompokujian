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

        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7e52948f2a987b071ede900cb50b96118dfdceef59920bd7f1f8ca081d8b9a04a00691bdca2e65deae2d2efb81bd82ad2d046f970c082df68b7fd5b409d16d5b2e8d9fa933374196545fee6af35f612f752a98f6d5fc552b1448556ddc315b9a60';
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);

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
        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7ef752122c1194c2e516804586db098b2d59c5750811426768b3f5dbc67f60da97c5e02bf845ad99e754b78f18deccb4433750f900fedca61d3a179eaae9c645da869e7c23d03e3c0ef1369cd2e03aac2d33fa7709802234d7f46b66203b7246e2';
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);
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

        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7ef752122c1194c2e516804586db098b2d59c5750811426768b3f5dbc67f60da97c5e02bf845ad99e754b78f18deccb4433750f900fedca61d3a179eaae9c645da869e7c23d03e3c0ef1369cd2e03aac2d33fa7709802234d7f46b66203b7246e2';
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);

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
        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7ef752122c1194c2e516804586db098b2d59c5750811426768b3f5dbc67f60da97c5e02bf845ad99e754b78f18deccb4433750f900fedca61d3a179eaae9c645da869e7c23d03e3c0ef1369cd2e03aac2d33fa7709802234d7f46b66203b7246e2';
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);

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
        $id = $courseId;
        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7e52948f2a987b071ede900cb50b96118dfdceef59920bd7f1f8ca081d8b9a04a00691bdca2e65deae2d2efb81bd82ad2d046f970c082df68b7fd5b409d16d5b2e8d9fa933374196545fee6af35f612f752a98f6d5fc552b1448556ddc315b9a60';
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);
        $response = $client->request('POST', 'http://203.24.51.52:4740/api/classroom/aktifkanCourse', [
            'form_params' => [
                'id' => $id,
            ]
        ]);
        $courseActive = $response->getBody();
        $courseDetail = json_decode($courseActive, true);
        //get detail item
        $courseState = $courseDetail['data']['courseState'];
        // echo $courseActive;

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
        $courseId = $course->courseId;
        $userId = $course->userId;

        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7e547f8d8686fd02939d5d7f294a1c037b15a644a303026feb332c590636b65b34a3e00b34c718e992eaf2615d5d4f6e3c87c15125b683e6b6b982e6e98012a3484c366715e762de12c56945e149ce68a002235a36b36b0ad386099cd6aed66d1a';
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);

        $response = $client->request('POST', 'http://203.24.51.52:4740/api/classroom/addteacher', [
            'form_params' => [
                'courseId' => $courseId,
                'userId' => $userId,
            ]
        ]);
        $courseAddTeacher = $response->getBody();
        $courseDetail = json_decode($courseAddTeacher, true);
        //get detail item
        // $courseId = $courseDetail['data']['id'];
        $studentName = $courseDetail['data']['nama_lengkap'];

        //save to db
        $course = new Teacher;
        $course->courseId = $courseId;
        $course->nameTeacher = $studentName;
        $course->teacherId = $userId;
        $course->save();

        $students = DB::table('teachers')->where('courseId',$course)->get();
        
        return redirect()->back();
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

        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7e547f8d8686fd02939d5d7f294a1c037b15a644a303026feb332c590636b65b34a3e00b34c718e992eaf2615d5d4f6e3c87c15125b683e6b6b982e6e98012a3484c366715e762de12c56945e149ce68a002235a36b36b0ad386099cd6aed66d1a';
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);

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
        // $courseId = $courseDetail['data']['id'];
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
        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7ef752122c1194c2e516804586db098b2d59c5750811426768b3f5dbc67f60da97c5e02bf845ad99e754b78f18deccb4433750f900fedca61d3a179eaae9c645da869e7c23d03e3c0ef1369cd2e03aac2d33fa7709802234d7f46b66203b7246e2';
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
        ]);

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