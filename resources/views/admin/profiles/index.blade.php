@extends('layouts.main')

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <h4 class="card-title"><strong>Row actions</strong></h4>

            <div class="card-body">
                <table class="table table-separated">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th class="text-center w-100px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td class="text-right table-actions">
                            <a class="table-action hover-primary" href="#"><i class="ti-pencil"></i></a>
                            <a class="table-action hover-danger" href="#"><i class="ti-trash"></i></a>
                            <div class="dropdown table-action">
                                <span class="dropdown-toggle no-caret hover-primary" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="ti-menu-alt"></i> Details</a>
                                    <a class="dropdown-item" href="#"><i class="ti-clip"></i> Add file</a>
                                    <a class="dropdown-item" href="#"><i class="ti-bar-chart"></i> Performance</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td class="text-right table-actions">
                            <a class="table-action hover-primary" href="#"><i class="ti-pencil"></i></a>
                            <a class="table-action hover-danger" href="#"><i class="ti-trash"></i></a>
                            <div class="dropdown table-action">
                                <span class="dropdown-toggle no-caret hover-primary" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="ti-menu-alt"></i> Details</a>
                                    <a class="dropdown-item" href="#"><i class="ti-clip"></i> Add file</a>
                                    <a class="dropdown-item" href="#"><i class="ti-bar-chart"></i> Performance</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td class="text-right table-actions">
                            <a class="table-action hover-primary" href="#"><i class="ti-pencil"></i></a>
                            <a class="table-action hover-danger" href="#"><i class="ti-trash"></i></a>
                            <div class="dropdown table-action">
                                <span class="dropdown-toggle no-caret hover-primary" data-toggle="dropdown"><i class="ti-more-alt rotate-90"></i></span>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="ti-menu-alt"></i> Details</a>
                                    <a class="dropdown-item" href="#"><i class="ti-clip"></i> Add file</a>
                                    <a class="dropdown-item" href="#"><i class="ti-bar-chart"></i> Performance</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
