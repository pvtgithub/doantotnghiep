<?php 
use App\Models\Contact;

$contacts = Contact::orderBy('time_contact','desc')->take(3)->get();
?>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Content Start -->
<div class="content">
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <form class="d-none d-md-flex ms-4">
            <input class="form-control bg-dark border-0" type="search" placeholder="Search">
        </form>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-envelope me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Contact</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    @foreach($contacts as $contact)
                    <a href="detailContact/{{$contact->id}}" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">{{$contact->name}} đã gửi cho bạn 1 tin nhắn</h6>
                                <small>Thời gian: {{$contact->time_contact}}</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    @endforeach

                    <a href="contacts" class="dropdown-item text-center">See all message</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/User_icon-cp.svg/1200px-User_icon-cp.svg.png" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">{{Auth::user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a href="{{Route('logout')}}" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>

