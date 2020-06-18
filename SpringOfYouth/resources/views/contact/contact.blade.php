@extends('layouts.main')

@section('title','Contact')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
@endsection

@section('custom_js')

    <script src="js/contact.js"></script>
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url(images/download.gif)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="{{route('index')}}">Home</a></li>
                                        <li>Contact</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">
        <div class="container">
            <div class="row">

                <!-- Get in touch -->
                <div class="col-lg-8 contact_col">
                    <div class="get_in_touch">
                        <div class="section_title">Write to us, we do not bite</div>
                        <div class="section_subtitle">Once the administrator will process your letter, you will be called back from the Helpdesk.</div>
                        <div class="contact_form_container">
                            <form action="{{route('create.message')}}" id="contact_form" class="contact_form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="contact_name">First Name*</label>
                                        <input type="text" id="contact_name" class="contact_input" required="required" name="add_user_first_name">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="contact_last_name">Last Name*</label>
                                        <input type="text" id="contact_last_name" class="contact_input" required="required" name="add_user_last_name">
                                    </div>
                                </div>
                                <div>
                                    <!-- Phone -->
                                    <label for="contact_company2">Phone*</label>
                                    <input type="text" id="contact_user" class="contact_input" required="required" name="add_user_phone">
                                </div>
                                <div>
                                    <!-- Subject -->
                                    <label for="contact_company">Subject</label>
                                    <input type="text" id="contact_company" class="contact_input" name="add_user_subject">
                                </div>
                                <div>
                                    <label for="contact_textarea">Message*</label>
                                    <textarea id="contact_textarea" class="contact_input contact_textarea" required="required" name="add_user_message"></textarea>
                                </div>
                                <button class="button contact_button" type="submit"><span>Send Message</span></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 offset-xl-1 contact_col">
                    <div class="contact_info">
                        <div class="contact_info_section">
                            <div class="contact_info_title">Marketing</div>
                            <ul>
                                <li>Phone: <span>+7 234 512 512</span></li>
                                <li>Email: <span>ronibib781@tmail7.com</span></li>
                            </ul>
                        </div>
                        <div class="contact_info_section">
                            <div class="contact_info_title">Shippiing & Returns</div>
                            <ul>
                                <li>Phone: <span>+7 383 2112 5123</span></li>
                                <li>Email: <span>dihitad503@nsabdev.com</span></li>
                            </ul>
                        </div>
                        <div class="contact_info_section">
                            <div class="contact_info_title">Information</div>
                            <ul>
                                <li>Phone: <span>+7 993 003 7059</span></li>
                                <li>Email: <span>sixaho2562@lexu4g.com</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row map_row">
                <div class="col">

                    <!-- Google Map -->
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8938.296421980784!2d-104.9494604008803!3d39.69017993723262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c7e77cb68f401%3A0x1b84ca2d89462561!2sXfinity%20Store%20by%20Comcast!5e0!3m2!1sru!2sru!4v1592228236352!5m2!1sru!2sru" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

