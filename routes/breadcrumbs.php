<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(trans('navbar.Home'), route('admin.dashboard.index'));
});

// Home > instructors
Breadcrumbs::for('fields', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('admin.field_title'), route('admin.fields.index'));
});

Breadcrumbs::for('add-fields', function (BreadcrumbTrail $trail) {
    $trail->parent('fields');
    $trail->push(trans('navbar.fields.add'), route('admin.fields.create'));
});
Breadcrumbs::for('update-fields', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('fields');
    $trail->push($row->title_ar, route('admin.fields.edit', $row));
});

Breadcrumbs::for('show-fields', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('fields');
    $trail->push($row->title_ar, route('admin.fields.show', $row));
});

// Home > students
Breadcrumbs::for('students', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.students.list'), route('admin.students.index'));
});

Breadcrumbs::for('add-students', function (BreadcrumbTrail $trail) {
    $trail->parent('students');
    $trail->push(trans('navbar.students.add'), route('admin.students.create'));
});
Breadcrumbs::for('update-students', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('students');
    $trail->push($row->name, route('admin.students.edit', $row));
});

Breadcrumbs::for('show-students', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('students');
    $trail->push($row->name, route('admin.students.show', $row));
});

// Home > tracks
Breadcrumbs::for('tracks', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.courses.list_tracks'), route('admin.tracks.index'));
});

Breadcrumbs::for('add-tracks', function (BreadcrumbTrail $trail) {
    $trail->parent('tracks');
    $trail->push(trans('navbar.courses.add_track'), route('admin.tracks.create'));
});
Breadcrumbs::for('update-tracks', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('tracks');
    $trail->push($row->name, route('admin.tracks.edit', $row));
});

// Home > certificates
Breadcrumbs::for('certificates', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.certificates.list'), route('admin.certificates.index'));
});

Breadcrumbs::for('add-certificates', function (BreadcrumbTrail $trail) {
    $trail->parent('certificates');
    $trail->push(trans('navbar.certificates.add'), route('admin.certificates.create'));
});
Breadcrumbs::for('update-certificates', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('certificates');
    $trail->push($row->name, route('admin.certificates.edit', $row));
});


// Home > downloads
Breadcrumbs::for('downloads', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.downloads.list'), route('admin.downloads.index'));
});

Breadcrumbs::for('add-downloads', function (BreadcrumbTrail $trail) {
    $trail->parent('downloads');
    $trail->push(trans('navbar.downloads.add'), route('admin.downloads.create'));
});
Breadcrumbs::for('update-downloads', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('downloads');
    $title = app()->getLocale() === 'ar' ? $row->title_ar : $row->title_en;
    $trail->push($title, route('admin.downloads.edit', $row));
});





Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.contacts.list'), route('admin.contacts.index'));
});
// Home > videos
Breadcrumbs::for('videos', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.videos.list'), route('admin.videos.index'));
});

Breadcrumbs::for('add-videos', function (BreadcrumbTrail $trail) {
    $trail->parent('videos');
    $trail->push(trans('navbar.videos.add'), route('admin.videos.create'));
});
Breadcrumbs::for('update-videos', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('videos');
    $title = app()->getLocale() === 'ar' ? $row->name_ar : $row->name_en;

    $trail->push($title, route('admin.videos.edit', $row));
});

// Home > course-sections
Breadcrumbs::for('course-sections', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.courses.list_sections'), route('admin.coursesections.index'));
});

Breadcrumbs::for('add-course-sections', function (BreadcrumbTrail $trail) {
    $trail->parent('course-sections');
    $trail->push(trans('navbar.courses.add_section'), route('admin.coursesections.create'));
});
Breadcrumbs::for('update-course-sections', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('course-sections');
    $trail->push($row->name, route('admin.coursesections.edit', $row));
});





Breadcrumbs::for('levels', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('admin.levels.title'), route('admin.levels.index'));
});



Breadcrumbs::for('add-levels', function (BreadcrumbTrail $trail) {
    $trail->parent('levels');
    $trail->push(trans('navbar.levels.add'), route('admin.levels.create'));
});
Breadcrumbs::for('update-levels', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('levels');
    $trail->push($row->name_ar, route('admin.levels.edit', $row));
});


// Home > blogs

Breadcrumbs::for('blogs', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.blogs.list'), route('admin.blogs.index'));
});

Breadcrumbs::for('add-blogs', function (BreadcrumbTrail $trail) {
    $trail->parent('blogs');
    $trail->push(trans('navbar.blogs.add'), route('admin.blogs.create'));
});
Breadcrumbs::for('update-blogs', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('blogs');
    $trail->push($row->title, route('admin.blogs.edit', $row));
});



Breadcrumbs::for('news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.news.list'), route('admin.news.index'));
});

Breadcrumbs::for('add-news', function (BreadcrumbTrail $trail) {
    $trail->parent('news');
    $trail->push(trans('navbar.news.add'), route('admin.news.create'));
});
Breadcrumbs::for('update-news', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('news');
    $trail->push($row->title, route('admin.news.edit', $row));
});



Breadcrumbs::for('projects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('admin.projects.list'), route('admin.projects.index'));
});

Breadcrumbs::for('add-projects', function (BreadcrumbTrail $trail) {
    $trail->parent('projects');
    $trail->push(trans('admin.projects.add'), route('admin.projects.create'));
});

Breadcrumbs::for('update-projects', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('projects');
    $trail->push($row->title_ar, route('admin.projects.edit', $row));
});



Breadcrumbs::for('show-projects', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('projects');
    $trail->push($row->title_ar, route('admin.projects.show', $row));
});

Breadcrumbs::for('banners', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.banners.list'), route('admin.banners.index'));
});

Breadcrumbs::for('add-banners', function (BreadcrumbTrail $trail) {
    $trail->parent('banners');
    $trail->push(trans('navbar.banners.add'), route('admin.banners.create'));
});
Breadcrumbs::for('update-banners', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('banners');
    $trail->push($row->title, route('admin.banners.edit', $row));
});



// Home > coupons
Breadcrumbs::for('coupons', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.coupons.list'), route('admin.coupons.index'));
});

Breadcrumbs::for('add-coupons', function (BreadcrumbTrail $trail) {
    $trail->parent('coupons');
    $trail->push(trans('navbar.coupons.add'), route('admin.coupons.create'));
});
Breadcrumbs::for('update-coupons', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('coupons');
    $trail->push($row->code, route('admin.coupons.edit', $row));
});


// Home > Parteners
Breadcrumbs::for('parteners', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.parteners.list'), route('admin.parteners.index'));
});

Breadcrumbs::for('add-parteners', function (BreadcrumbTrail $trail) {
    $trail->parent('parteners');
    $trail->push(trans('navbar.parteners.add'), route('admin.parteners.create'));
});
Breadcrumbs::for('update-parteners', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('parteners');
    $trail->push($row->name, route('admin.parteners.edit', $row));
});




// Home > countries
Breadcrumbs::for('countries', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.list_countries'), route('admin.countries.index'));
});

Breadcrumbs::for('add-countries', function (BreadcrumbTrail $trail) {
    $trail->parent('countries');
    $trail->push(trans('navbar.add_countries'), route('admin.countries.create'));
});
Breadcrumbs::for('update-countries', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('countries');
    $trail->push($row->name, route('admin.countries.edit', $row));
});

// Home > CV
Breadcrumbs::for('cvs', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.cvs.list'), route('admin.cvs.index'));
});

Breadcrumbs::for('add-cvs', function (BreadcrumbTrail $trail) {
    $trail->parent('cvs');
    $trail->push(trans('navbar.cvs.add'), route('admin.cvs.create'));
});
Breadcrumbs::for('update-cvs', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('cvs');
    $trail->push(trans('navbar.cvs.edit'), route('admin.cvs.edit', $row));
});




// tickets 
Breadcrumbs::for('visitor-messages', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.tickets.visitors'), route('admin.visitorstickets'));
});

Breadcrumbs::for('student-messages', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.tickets.student_msg'), route('admin.studentstickets'));
});

Breadcrumbs::for('instructor-messages', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.tickets.instrutor_msg'), route('admin.instructorstickets'));
});



Breadcrumbs::for('show-tickets', function (BreadcrumbTrail $trail, $row) {
    if ($row->student_id != null)
        $trail->parent('student-messages');
    elseif ($row->instructor_id != null)
        $trail->parent('instructor-messages');
    else
        $trail->parent('visitor-messages');
    $trail->push(trans('navbar.tickets.show'), route('admin.tickets.show', $row));
});


Breadcrumbs::for('teams', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.teams.list'), route('admin.teams.index'));
});

Breadcrumbs::for('add-teams', function (BreadcrumbTrail $trail) {
    $trail->parent('teams');
    $trail->push(trans('navbar.teams.add'), route('admin.teams.create'));
});
Breadcrumbs::for('update-teams', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('teams');
    $trail->push($row->name, route('admin.teams.edit', $row));
});

// Home > users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.users.list'), route('admin.users.index'));
});

Breadcrumbs::for('add-users', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push(trans('navbar.users.add'), route('admin.users.create'));
});
Breadcrumbs::for('update-users', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('users');
    $trail->push($row->name, route('admin.users.edit', $row));
});

Breadcrumbs::for('show-users', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('users');
    $trail->push($row->name, route('admin.users.show', $row));
});



// Home > roles
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.roles.list'), route('admin.roles.index'));
});

Breadcrumbs::for('add-roles', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push(trans('navbar.roles.add'), route('admin.roles.create'));
});
Breadcrumbs::for('update-roles', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('roles');
    $trail->push($row->name, route('admin.roles.edit', $row));
});

Breadcrumbs::for('show-roles', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('roles');
    $trail->push($row->name, route('admin.roles.show', $row));
});


// Home > Courses
Breadcrumbs::for('courses', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.courses.list_courses'), route('admin.courses.index'));
});

Breadcrumbs::for('add-courses', function (BreadcrumbTrail $trail) {
    $trail->parent('courses');
    $trail->push(trans('navbar.courses.add_course'), route('admin.courses.create'));
});

Breadcrumbs::for('show-courses', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('courses');
    $trail->push($row->name, route('admin.courses.show', $row));
});

Breadcrumbs::for('update-courses', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('show-courses', $row);
    $trail->push(trans('navbar.courses.edit_course'), route('admin.courses.edit', $row));
});




Breadcrumbs::for('course-types', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.courses.list_course_types'), route('admin.course-types.index'));
});

Breadcrumbs::for('add-course-types', function (BreadcrumbTrail $trail) {
    $trail->parent('course-types');
    $trail->push(trans('navbar.courses.add_course_types'), route('admin.course-types.create'));
});

Breadcrumbs::for('update-course-types', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('course-types');
    $trail->push(trans('navbar.courses.edit_course_types'), route('admin.course-types.edit', $row));
});











// Home > Levels details  > Lectures
Breadcrumbs::for('lectures', function (BreadcrumbTrail $trail, $course, $level) {
    $trail->parent('show-levels', $course, $level);
    $trail->push(trans('navbar.courses.list_lectures'), route('admin.levels.lectures.index', $level));
});

Breadcrumbs::for('add-lectures', function (BreadcrumbTrail $trail, $course, $level) {
    $trail->parent('lectures', $course, $level);
    $trail->push(trans('navbar.courses.add_lecture'), route('admin.levels.lectures.create', $level));
});

Breadcrumbs::for('update-lectures', function (BreadcrumbTrail $trail, $course, $level, $row) {
    $trail->parent('lectures', $course, $level);
    $trail->push($row->title, route('admin.levels.lectures.edit', [$level, $row]));
});

//subscriptions
Breadcrumbs::for('subscribtions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.subscriptions.list'), route('admin.subscriptions.index'));
});

Breadcrumbs::for('add-subscribtions', function (BreadcrumbTrail $trail) {
    $trail->parent('subscribtions');
    $trail->push(trans('navbar.subscriptions.add'), route('admin.subscriptions.create'));
});



Breadcrumbs::for('externalCertifications', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.certifications.externel_certification'), route('admin.externelstudentscertifications'));
});

Breadcrumbs::for('platformCertifications', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.certifications.list_dwafer'), route('admin.certifications.index'));
});

Breadcrumbs::for('student-platformCertifications', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.certifications.student_certifications'), route('admin.studentscertifications'));
});


Breadcrumbs::for('grantingCertifications', function (BreadcrumbTrail $trail) {
    $trail->parent('student-platformCertifications');
    $trail->push(trans('navbar.certifications.add'), route('admin.grantingcertificate'));
});


Breadcrumbs::for('add-externalCertifications', function (BreadcrumbTrail $trail) {
    $trail->parent('platformCertifications');
    $trail->push(trans('navbar.certifications.add_certificate'), route('student.certifications.create'));
});



Breadcrumbs::for('edit-externalCertifications', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('platformCertifications');
    $trail->push($row->name, route('student.certifications.edit', $row));
});





// Home > Courses
Breadcrumbs::for('bankgroups', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.bankgroups.list'), route('admin.bank-groups.index'));
});

Breadcrumbs::for('add-bankgroups', function (BreadcrumbTrail $trail) {
    $trail->parent('bankgroups');
    $trail->push(trans('navbar.bankgroups.add'), route('admin.bank-groups.create'));
});

Breadcrumbs::for('show-bankgroups', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('bankgroups');
    $trail->push($row->name, route('admin.bank-groups.show', $row));
});

Breadcrumbs::for('update-bankgroups', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('show-bankgroups', $row);
    $trail->push(trans('navbar.bankgroups.edit'), route('admin.courses.edit', $row));
});



Breadcrumbs::for('bankquestions', function (BreadcrumbTrail $trail, $course) {
    $trail->parent('show-bankgroups', $course);
    $trail->push(trans('navbar.bankquestions.list'), route('admin.bank-groups.bank-questions.index', $course));
});

Breadcrumbs::for('add-bankquestions', function (BreadcrumbTrail $trail, $course) {
    $trail->parent('bankquestions', $course);
    $trail->push(trans('navbar.bankquestions.add'), route('admin.bank-groups.bank-questions.create', $course));
});
Breadcrumbs::for('update-bankquestions', function (BreadcrumbTrail $trail, $bankgroup, $row) {
    $trail->parent('bankquestions', $bankgroup);
    $trail->push($row->id, route('admin.bank-groups.bank-questions.edit', [$bankgroup, $row]));
});

Breadcrumbs::for('show-bankquestions', function (BreadcrumbTrail $trail, $bankgroup, $row) {
    $trail->parent('bankquestions', $bankgroup);
    $trail->push($row->customTitle, route('admin.bankquestions.show', $row));
});



Breadcrumbs::for('list-results', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.exams.exam_result'), route('admin.studentsexamresults'));
});


Breadcrumbs::for('show-result', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('list-results');
    $trail->push(optional($row->student)->name, route('admin.studentexam', $row));
});




Breadcrumbs::for('listmails', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.tickets.subscribedMail'), route('admin.listemails.index'));
});

Breadcrumbs::for('send-emails', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.tickets.sendMail'), route('admin.listemails.create'));
});



Breadcrumbs::for('comments', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.courses.reviews'), route('admin.comments.index'));
});

Breadcrumbs::for('notifications', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.notifications.list'), route('admin.notifications.index'));
});


Breadcrumbs::for('show-notifications', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('notifications');
    $trail->push($row->subject, route('admin.notifications.show', $row));
});

Breadcrumbs::for('send-notification', function (BreadcrumbTrail $trail) {
    $trail->parent('notifications');
    $trail->push(trans('navbar.notifications.create'), route('admin.notifications.create'));
});
// Home > payment types
Breadcrumbs::for('payment-types', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.payment-types.list'), route('admin.payment-types.index'));
});

Breadcrumbs::for('add-payment-types', function (BreadcrumbTrail $trail) {
    $trail->parent('payment-types');
    $trail->push(trans('navbar.payment-types.add'), route('admin.payment-types.create'));
});
Breadcrumbs::for('update-payment-types', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('payment-types');
    $trail->push($row->name, route('admin.payment-types.edit', $row));
});





/** Student dashboard  */

// Home
Breadcrumbs::for('student-home', function (BreadcrumbTrail $trail) {
    $trail->push(trans('navbar.Home'), route('student.dashboard.index'));
});
Breadcrumbs::for('add-student-externalCertifications', function (BreadcrumbTrail $trail) {
    $trail->parent('studentexternalCertifications');
    $trail->push(trans('navbar.certifications.add_student_certification'), route('student.certifications.create'));
});

Breadcrumbs::for('student-payments', function (BreadcrumbTrail $trail) {
    $trail->parent('student-home');
    $trail->push(trans('navbar.payments.list'), route('student.payments.index'));
});

Breadcrumbs::for('update-student-profile', function (BreadcrumbTrail $trail) {
    $trail->parent('student-home');
    $trail->push(trans('navbar.students_side.profile'), route('student.getProfile'));
});


Breadcrumbs::for('student-list-results', function (BreadcrumbTrail $trail) {
    $trail->parent('student-home');
    $trail->push(trans('navbar.exams.exam_result'), route('student.examresults'));
});


Breadcrumbs::for('student-show-result', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('student-list-results');
    $trail->push(optional($row->student)->name, route('student.studentexam', $row));
});

Breadcrumbs::for('studentexternalCertifications', function (BreadcrumbTrail $trail) {
    $trail->parent('student-home');
    $trail->push(trans('navbar.certifications.student_externel_certification'), route('student.externalCertifications'));
});

Breadcrumbs::for('studentplatformCertifications', function (BreadcrumbTrail $trail) {
    $trail->parent('student-home');
    $trail->push(trans('navbar.certifications.student_platform_certification'), route('student.platformCertifications'));
});



Breadcrumbs::for('studentboard-list-results', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.exams.exam_result'), route('admin.studentsexamresults'));
});


Breadcrumbs::for('studentboard-show-result', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('studentboard-list-results');
    $trail->push(optional($row->student)->name, route('admin.studentexam', $row));
});


/**  */
Breadcrumbs::for('instrucor-home', function (BreadcrumbTrail $trail) {
    $trail->push(trans('navbar.Home'), route('instructor.dashboard.index'));
});


Breadcrumbs::for('instructor-list-results', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.exams.exam_result'), route('instructor.studentsexamresults'));
});


Breadcrumbs::for('instructor-paidrequests', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.instructors_side.paid_profits'), route('instructor.listPaidRequest'));
});


Breadcrumbs::for('list-instructor-paidrequests', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.instructors_side.profits_requests'), route('instructor.listRequest'));
});


Breadcrumbs::for('list-instructor-payments', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.instructors_side.paid_profits_requests'), route('instructor.listPaidRequest'));
});

Breadcrumbs::for('list-instructor-payments-requests', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.instructors_side.profits_requests'), route('instructor.listRequest'));
});


Breadcrumbs::for('add-instructor-paidrequests', function (BreadcrumbTrail $trail) {
    $trail->parent('list-instructor-paidrequests');
    $trail->push(trans('navbar.instructors_side.add_profits_requests'), route('instructor.requestProfit'));
});

Breadcrumbs::for('edit-instructor-paidrequests', function (BreadcrumbTrail $trail) {
    $trail->parent('list-instructor-paidrequests');
    $trail->push(trans('navbar.instructors_side.edit_profit'), route('instructor.updateRequest'));
});


Breadcrumbs::for('instructor-show-result', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('instructor-list-results');
    $trail->push(optional($row->student)->name, route('instructor.studentexam', $row));
});


Breadcrumbs::for('instructor-quizzes', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.quizzes.list'), route('instructor.quizzes'));
});

Breadcrumbs::for('show-instructor-quizz', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('instructor-quizzes');
    $trail->push($row->name, route('instructor.quizz', $row));
});

Breadcrumbs::for('update-instructor-profile', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.instructors_side.profile'), route('instructor.getProfile'));
});

Breadcrumbs::for('instructor-students', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.instructors_side.mystudents'), route('instructor.students'));
});

Breadcrumbs::for('instructor-courses', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.instructors_side.mycourses'), route('instructor.students'));
});

Breadcrumbs::for('instructor-profits', function (BreadcrumbTrail $trail) {
    $trail->parent('instrucor-home');
    $trail->push(trans('navbar.instructors_side.profit_title'), route('instructor.myprofits'));
});



// Quiz
Breadcrumbs::for('quizzes', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.quizzes.list'), route('admin.quizzes.index'));
});

Breadcrumbs::for('add-quizzes', function (BreadcrumbTrail $trail) {
    $trail->parent('quizzes');
    $trail->push(trans('navbar.quizzes.add'), route('admin.quizzes.create'));
});

Breadcrumbs::for('show-quizzes', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('quizzes');
    $trail->push($row->name, route('admin.quizzes.show', $row));
});

Breadcrumbs::for('update-quizzes', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('quizzes');
    $trail->push($row->name, route('admin.quizzes.edit', $row));
});


Breadcrumbs::for('sections', function (BreadcrumbTrail $trail, $quiz) {
    $trail->parent('show-quizzes', $quiz);
    $trail->push(trans('navbar.sections.list'), route('admin.quizzes.sections.index', $quiz));
});

Breadcrumbs::for('add-sections', function (BreadcrumbTrail $trail, $quiz) {
    $trail->parent('sections', $quiz);
    $trail->push(trans('navbar.sections.add'), route('admin.quizzes.sections.create', $quiz));
});
Breadcrumbs::for('update-sections', function (BreadcrumbTrail $trail, $quiz, $row) {
    $trail->parent('sections', $quiz);
    $trail->push($row->title, route('admin.quizzes.sections.edit', [$quiz, $row]));
});

Breadcrumbs::for('show-sections', function (BreadcrumbTrail $trail, $quiz, $row) {
    $trail->parent('sections', $quiz);
    $trail->push($row->title, route('admin.quizzes.edit', $row));
});


Breadcrumbs::for('quiz-questions', function (BreadcrumbTrail $trail, $quiz) {
    $trail->parent('show-quizzes', $quiz);
    $trail->push(trans('navbar.bankquestions.list'), route('admin.quizzes.questions.index', $quiz));
});

Breadcrumbs::for('add-quiz-questions', function (BreadcrumbTrail $trail, $quiz) {
    $trail->parent('quiz-questions', $quiz);
    $trail->push(trans('navbar.bankquestions.add'), route('admin.quizzes.questions.create', $quiz));
});
Breadcrumbs::for('update-quiz-questions', function (BreadcrumbTrail $trail, $quiz, $row) {
    $trail->parent('quiz-questions', $quiz);
    $trail->push($row->title, route('admin.quizzes.questions.edit', [$quiz, $row]));
});

Breadcrumbs::for('show-quiz-questions', function (BreadcrumbTrail $trail, $quiz, $row) {
    $trail->parent('quiz-questions', $quiz);
    $trail->push($row->title, route('admin.quizzes.edit', $row));
});


Breadcrumbs::for('all-student-payments', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.finances.students_payment'), route('admin.studentspayment'));
});


Breadcrumbs::for('instructors-profits', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.finances.instructors_profit'), route('admin.instructorProfits'));
});

Breadcrumbs::for('instructor-profit-details', function (BreadcrumbTrail $trail, $instructor) {
    $trail->parent('instructors-profits');
    $trail->push(trans('navbar.finances.instructor_profit_details'), route('admin.instructorProfitdetails', $instructor));
});




/** Faqs Questions  */
Breadcrumbs::for('faq-questions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.settings.questions'), route('admin.questions.index'));
});

Breadcrumbs::for('add-faq-questions', function (BreadcrumbTrail $trail) {
    $trail->parent('faq-questions');
    $trail->push(trans('navbar.settings.add_faq_questions'), route('admin.questions.create'));
});
Breadcrumbs::for('update-faq-questions', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('faq-questions');
    $trail->push($row->question, route('admin.questions.edit', $row));
});


/** policies Questions  */
Breadcrumbs::for('policies', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.settings.policies'), route('admin.policies.index'));
});

Breadcrumbs::for('add-policies', function (BreadcrumbTrail $trail) {
    $trail->parent('policies');
    $trail->push(trans('navbar.settings.add_policies'), route('admin.policies.create'));
});
Breadcrumbs::for('update-policies', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('policies');
    $trail->push($row->title, route('admin.policies.edit', $row));
});


/** reviews  */
Breadcrumbs::for('reviews', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.settings.reviews'), route('admin.reviews.index'));
});

Breadcrumbs::for('add-reviews', function (BreadcrumbTrail $trail) {
    $trail->parent('reviews');
    $trail->push(trans('navbar.settings.add_reviews'), route('admin.reviews.create'));
});
Breadcrumbs::for('update-reviews', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('reviews');
    $trail->push($row->name, route('admin.reviews.edit', $row));
});


/** languages  */
Breadcrumbs::for('languages', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.settings.languages'), route('admin.languages.index'));
});

Breadcrumbs::for('add-languages', function (BreadcrumbTrail $trail) {
    $trail->parent('languages');
    $trail->push(trans('navbar.settings.add_languages'), route('admin.languages.create'));
});
Breadcrumbs::for('update-languages', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('languages');
    $trail->push($row->name, route('admin.languages.edit', $row));
});



// Home > Parteners
Breadcrumbs::for('faculities', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.faculities.list'), route('admin.faculities.index'));
});

Breadcrumbs::for('add-faculities', function (BreadcrumbTrail $trail) {
    $trail->parent('faculities');
    $trail->push(trans('navbar.faculities.add'), route('admin.faculities.create'));
});
Breadcrumbs::for('update-faculities', function (BreadcrumbTrail $trail, $row) {
    $trail->parent('faculities');
    $trail->push($row->name, route('admin.faculities.edit', $row));
});



Breadcrumbs::for('importexportModule', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.settings.importexport'), route('admin.bulk.import-export'));
});

Breadcrumbs::for('subjects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.subjects.list'), route('admin.subjects.index'));
});

Breadcrumbs::for('first-class-subjects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.subjects.first_class'), route('admin.subjects.firstsubjects'));
});

Breadcrumbs::for('second-class-subjects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.subjects.second_class'), route('admin.subjects.secondsubjects'));
});

Breadcrumbs::for('third-class-subjects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(trans('navbar.subjects.third_class'), route('admin.subjects.thirdsubjects'));
});


Breadcrumbs::for('add-subjects', function (BreadcrumbTrail $trail) {
    if (request()->input('classroom') == 1)
        $trail->parent('first-class-subjects');
    elseif (request()->input('classroom') == 2)
        $trail->parent('second-class-subjects');
    elseif (request()->input('classroom') == 3)
        $trail->parent('third-class-subjects');
    else
        $trail->parent('subjects');
    $trail->push(trans('navbar.subjects.add'), route('admin.subjects.create'));
});
Breadcrumbs::for('update-subjects', function (BreadcrumbTrail $trail, $row) {
    if (request()->input('classroom') == 1)
        $trail->parent('first-class-subjects');
    elseif (request()->input('classroom') == 2)
        $trail->parent('second-class-subjects');
    elseif (request()->input('classroom') == 3)
        $trail->parent('third-class-subjects');
    else
        $trail->parent('subjects');

    $trail->push($row->name, route('admin.subjects.edit', $row));
});
