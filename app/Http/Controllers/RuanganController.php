<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    //course
    public function index()
    {
        return view ('pages.ruangan');

    }

    public function addCourse()
    {
        return view ('add.tambahruangan');

    }

    public function storeCourse(Request $course)
    {
        


        //save to db
        $course = new Ruangan;
        $course->nama_course = $course->name;
        $course->ownerId = $course->ownerId;
        $course->description = $course->description;
        $course->descriptionHeading = $course->descriptionHeading;
        $course->section = $course->section;
        $course->save();
        
        // redirect
        return redirect('/admin/pengumuman')->with('success', 'Berhasil Menambahkan Pengumuman');

    }

    public function editCourse()
    {

    }

    public function updateCourse()
    {

    }

    public function archiveCourse()
    {

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