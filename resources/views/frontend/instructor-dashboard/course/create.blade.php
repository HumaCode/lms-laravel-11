@extends('frontend.instructor-dashboard.course.course-app')

@section('contest')
    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
        <div class="add_course_basic_info">
            <form action="{{ route('instructor.courses.store-basic-info') }}" method="POST" class="basic_info_form">
                @csrf

                <div class="row">
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Title *</label>
                            <input type="text" placeholder="Title" name="title">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Slug *</label>
                            <input type="text" placeholder="Slug" name="slug">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Seo description</label>
                            <input type="text" placeholder="Seo description" name="seo_description">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Thumbnail *</label>
                            <input type="file" name="thumbnail">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="demo_video_storage">Demo Video Storage </label>
                            <select class="select_js" name="demo_video_storage" id="demo_video_storage">
                                <option selected disabled> Please Select </option>
                                <option value="upload">Upload</option>
                                <option value="youtube">Youtube</option>
                                <option value="vimeo">Vimeo</option>
                                <option value="external_link">External Link</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="demo_video_source">Path</label>
                            <input type="file" name="demo_video_source" id="demo_video_source">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="price">Price *</label>
                            <input type="text" placeholder="Price" name="price" id="price">
                            <p>Put 0 for free</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="discount">Discount Price</label>
                            <input type="text" placeholder="Discount Price" name="discount" id="discount">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput mb-0">
                            <label for="description">Description</label>
                            <textarea rows="8" placeholder="Description" name="description"></textarea>
                            <button type="submit" class="common_btn mt_20">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0"
        data-select2-id="select2-data-pills-profile">
        <div class="add_course_more_info" data-select2-id="select2-data-12-9phc">
            <form action="#" data-select2-id="select2-data-11-y3mg">
                <div class="row" data-select2-id="select2-data-10-2dwf">
                    <div class="col-xl-6">
                        <div class="add_course_more_info_input">
                            <label for="#">Capacity</label>
                            <input type="text" placeholder="Capacity">
                            <p>leave blank for unlimited</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_more_info_input">
                            <label for="#">Course Duration (Minutes)*</label>
                            <input type="text" placeholder="300">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_more_info_checkbox">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Q&amp;A</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">Completion Certificate</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">Patner
                                    instructor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                <label class="form-check-label" for="flexCheckDefault4">Others</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" data-select2-id="select2-data-9-zhyi">
                        <div class="add_course_more_info_input" data-select2-id="select2-data-8-78yb">
                            <label for="#">Category *</label>
                            <select class="select_2 select2-hidden-accessible" data-select2-id="select2-data-1-0ip4"
                                tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="select2-data-3-0uhg">
                                    Please Select </option>
                                <option value="" data-select2-id="select2-data-19-a884">
                                    Red</option>
                                <option value="" data-select2-id="select2-data-20-cozs">
                                    Black</option>
                                <option value="" data-select2-id="select2-data-21-qfw5">
                                    Orange</option>
                                <option value="" data-select2-id="select2-data-22-g078">
                                    Rose Gold</option>
                                <option value="" data-select2-id="select2-data-23-puvk">
                                    Pink</option>
                            </select><span
                                class="select2 select2-container select2-container--default select2-container--above"
                                dir="ltr" data-select2-id="select2-data-2-1ewe" style="width: auto;"><span
                                    class="selection"><span class="select2-selection select2-selection--single"
                                        role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                        aria-disabled="false" aria-labelledby="select2-g9xk-container"
                                        aria-controls="select2-g9xk-container"><span class="select2-selection__rendered"
                                            id="select2-g9xk-container" role="textbox" aria-readonly="true"
                                            title="Pink">Pink</span><span class="select2-selection__arrow"
                                            role="presentation"><b role="presentation"></b></span></span></span><span
                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="add_course_more_info_radio_box">
                            <h3>Level</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" checked="">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Beginner
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Intermediate
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Expert
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Expert
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="add_course_more_info_radio_box">
                            <h3>Language</h3>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                    id="flexRadioDefault11" checked="">
                                <label class="form-check-label" for="flexRadioDefault11">
                                    English
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                    id="flexRadioDefault12">
                                <label class="form-check-label" for="flexRadioDefault12">
                                    Hindi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                    id="flexRadioDefault13">
                                <label class="form-check-label" for="flexRadioDefault13">
                                    Arabic
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault1"
                                    id="flexRadioDefault14">
                                <label class="form-check-label" for="flexRadioDefault14">
                                    Francais
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="common_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
        <div class="add_course_content">
            <div class="add_course_content_btn_area d-flex flex-wrap justify-content-between">
                <a class="common_btn" href="#">Add New Chapter</a>
                <a class="common_btn" href="#">Short Chapter</a>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span>Introduction</span>
                        </button>
                        <div class="add_course_content_action_btn">
                            <div class="dropdown">
                                <div class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="far fa-plus" aria-hidden="true"></i>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Add Lesson</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Add
                                            Document</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Add Quiz</a>
                                    </li>
                                </ul>
                            </div>
                            <a class="edit" href="#"><i class="far fa-edit" aria-hidden="true"></i></a>
                            <a class="del" href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
                        </div>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="item_list">
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <span>Accordion Item #1</span>
                                        </button>
                                        <div class="add_course_content_action_btn">
                                            <div class="dropdown">
                                                <div class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="far fa-plus" aria-hidden="true"></i>
                                                </div>
                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                    <li><a class="dropdown-item" href="#">Add Lesson</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Add Document</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Add Quiz</a></li>
                                                </ul>
                                            </div>
                                            <a class="edit" href="#"><i class="far fa-edit"
                                                    aria-hidden="true"></i></a>
                                            <a class="del" href="#"><i class="fas fa-trash-alt"
                                                    aria-hidden="true"></i></a>
                                        </div>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for
                                            this accordion, which is intended to demonstrate
                                            the <code>.accordion-flush</code> class. This is
                                            the first item's accordion body.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span>Data Structures and Algorithms in Python</span>
                        </button>
                        <div class="add_course_content_action_btn">
                            <div class="dropdown">
                                <div class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="far fa-plus" aria-hidden="true"></i>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Add Lesson</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Add
                                            Document</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Add Quiz</a>
                                    </li>
                                </ul>
                            </div>
                            <a class="edit" href="#"><i class="far fa-edit" aria-hidden="true"></i></a>
                            <a class="del" href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
                        </div>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="item_list">
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <span>Accordion Item #2</span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for
                                            this accordion, which is intended to demonstrate
                                            the <code>.accordion-flush</code> class. This is
                                            the second item's accordion body. Let's imagine
                                            this being filled with some actual content.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                            <span>Data Analysis with Pandas</span>
                        </button>
                        <div class="add_course_content_action_btn">
                            <div class="dropdown">
                                <div class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="far fa-plus" aria-hidden="true"></i>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Add Lesson</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Add
                                            Document</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Add Quiz</a>
                                    </li>
                                </ul>
                            </div>
                            <a class="edit" href="#"><i class="far fa-edit" aria-hidden="true"></i></a>
                            <a class="del" href="#"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
                        </div>
                    </h2>
                    <div id="collapseThree2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul class="item_list">
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <span>Aut autem dolorem debitis mollitia.</span>
                                    <div class="add_course_content_action_btn">
                                        <a class="edit" href="#"><i class="far fa-edit"
                                                aria-hidden="true"></i></a>
                                        <a class="del" href="#"><i class="fas fa-trash-alt"
                                                aria-hidden="true"></i></a>
                                        <a class="arrow" href="#"><i class="fas fa-arrows-alt"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            <span>Accordion Item #3</span>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for
                                            this accordion, which is intended to demonstrate
                                            the <code>.accordion-flush</code> class. This is
                                            the third item's accordion body. Nothing more
                                            exciting happening here in terms of content, but
                                            just filling up the space to make it look, at
                                            least at first glance, a bit more representative
                                            of how this would look in a real-world
                                            application.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2" tabindex="0">
        <div class="dashboard_add_course_finish">
            <form action="#">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="add_course_more_info_input">
                            <label for="#">Message for Reviewer</label>
                            <textarea rows="7" placeholder="Message for Reviewer"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_more_info_input mb-0">
                            <label for="#">Status *</label>
                            <select class="select_2 select2-hidden-accessible" data-select2-id="select2-data-4-p491"
                                tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="select2-data-6-gp6e">
                                    Please Select </option>
                                <option value="">Red</option>
                                <option value="">Black</option>
                                <option value="">Orange</option>
                                <option value="">Rose Gold</option>
                                <option value="">Pink</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                data-select2-id="select2-data-5-z94x" style="width: auto;"><span class="selection"><span
                                        class="select2-selection select2-selection--single" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-ctxe-container"
                                        aria-controls="select2-ctxe-container"><span class="select2-selection__rendered"
                                            id="select2-ctxe-container" role="textbox" aria-readonly="true"
                                            title=" Please Select ">
                                            Please Select </span><span class="select2-selection__arrow"
                                            role="presentation"><b role="presentation"></b></span></span></span><span
                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                            <button type="submit" class="common_btn mt_25">save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
