<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelompok;
use App\Ruangan;
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
    public function courseDetail()
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
        return $courseDecode;

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

        $token = 'd9b74714730ad7f21f33bba9e80bb5895c69fc1ec851b42b5450a18baefb296b55502074b2eb3b01d1d7f01449527097b2697075a4cd317c37ef1ef32bbf1d6de8cfae65b2e593da4383b6f7661a514ed163a45fb3509ccfc0635eaeebfbec7ef752122c1194c2e516804586db098b2d59c5750811426768b3f5dbc67f60da97c5e02bf845ad99e754b78f18deccb4433750f900fedca61d3a179eaae9c645da869e7c23d03e3c0ef1369cd2e03aac2d33fa7709802234d7f46b66203b7246e2';
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
        $courseLink = $courseDetail['data']['alternateLink'];

        //save to db
        $course = new Ruangan;
        $course->kelompok_id = $kelompok_id;
        $course->courseId = $courseId;
        $course->courseName = $courseName;
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



    //techer course
    public function teacher()
    {

    }

    public function addTeacher()
    {

    }


    public function deleteTeacher()
    {

    }

    //student course
    public function student()
    {

    }

    public function addStudent()
    {

    }

    public function deleteStudent()
    {

    }



}