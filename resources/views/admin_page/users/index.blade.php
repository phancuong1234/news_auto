@extends('layouts.admin.master')
@section('title')
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admin</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Assignee
                                    </th>
                                    <th>
                                        Subject
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Last Update
                                    </th>
                                    <th>
                                        Tracking ID
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="images/faces/face4.jpg" class="mr-2" alt="image">
                                        John Doe
                                    </td>
                                    <td>
                                        Loosing control on server
                                    </td>
                                    <td>
                                        <label class="badge badge-gradient-danger">REJECTED</label>
                                    </td>
                                    <td>
                                        Dec 3, 2017
                                    </td>
                                    <td>
                                        WD-12348
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mod và biên tập viên</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    Assignee
                                </th>
                                <th>
                                    Subject
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Last Update
                                </th>
                                <th>
                                    Tracking ID
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <img src="images/faces/face1.jpg" class="mr-2" alt="image">
                                    David Grey
                                </td>
                                <td>
                                    Fund is not recieved
                                </td>
                                <td>
                                    <label class="badge badge-gradient-success">DONE</label>
                                </td>
                                <td>
                                    Dec 5, 2017
                                </td>
                                <td>
                                    WD-12345
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/faces/face2.jpg" class="mr-2" alt="image">
                                    Stella Johnson
                                </td>
                                <td>
                                    High loading time
                                </td>
                                <td>
                                    <label class="badge badge-gradient-warning">PROGRESS</label>
                                </td>
                                <td>
                                    Dec 12, 2017
                                </td>
                                <td>
                                    WD-12346
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/faces/face3.jpg" class="mr-2" alt="image">
                                    Marina Michel
                                </td>
                                <td>
                                    Website down for one week
                                </td>
                                <td>
                                    <label class="badge badge-gradient-info">ON HOLD</label>
                                </td>
                                <td>
                                    Dec 16, 2017
                                </td>
                                <td>
                                    WD-12347
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/faces/face4.jpg" class="mr-2" alt="image">
                                    John Doe
                                </td>
                                <td>
                                    Loosing control on server
                                </td>
                                <td>
                                    <label class="badge badge-gradient-danger">REJECTED</label>
                                </td>
                                <td>
                                    Dec 3, 2017
                                </td>
                                <td>
                                    WD-12348
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Người dùng</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Tên
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Trạng Thái
                                    </th>
                                    <th>
                                        Hành Động
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        WD-12345
                                    </td>
                                    <td>
                                        <img src="{{ asset('/templates/admin/images/faces/face1.jpg') }}" class="mr-2" alt="image">
                                        David Grey
                                    </td>
                                    <td>
                                        Fund is not recieved
                                    </td>
                                    <td>
                                        <label class="badge badge-gradient-success">Active</label>
                                    </td>
                                    <td>
                                        <a href="">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        <a href="" style="margin-left: 10%">
                                            <i class="mdi mdi-tooltip-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
