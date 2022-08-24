<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
use Source\Core\Session;

ini_set('default_charset', 'UTF-8');

$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\Controllers");

$route->get("/editor", "App:editor");

$route->group("/app");
$route->get("/", "Home:home");
$route->get("/logout", "App:logout");

/** Users */
$route->get("/students", "Students:students");
$route->post("/students", "Students:students");
$route->get("/students/{search}/{page}", "Students:students");
$route->post("/students/student", "Students:student");
$route->post("/search_student", "Students:search_student");

/** User_edit */
$route->get("/user_edit", "App:user_edit");
$route->post("/user_edit", "App:user_edit");

/** Vídeos */
$route->get("/posture_analysis_videos", "PostureAnalysisVideos:posture_analysis_videos");
$route->post("/posture_analysis_videos/update", "PostureAnalysisVideos:update");
$route->post("/posture_analysis_videos/create", "PostureAnalysisVideos:create");

/** Student Detail */
$route->get("/to_manager/{user_id}/chat", "Students:student_detail");
$route->get("/to_manager/{user_id}/physical_form", "Students:student_physical_form");
$route->get("/to_manager/{user_id}/video", "Students:video");
$route->post("/to_manager/{user_id}/video", "Students:video");


/** Files */
$route->get("/to_manager/{user_id}/chat/files", "Students:UploadFiles");
$route->post("/to_manager/{user_id}/chat/files", "Students:UploadFiles");
$route->get("/to_manager/{user_id}/chat/files/{search}/{page}", "Students:UploadFiles");

/** Photos */
$route->get("/to_manager/{user_id}/chat/photos", "Students:UploadPhotos");
$route->post("/to_manager/{user_id}/chat/photos", "Students:UploadPhotos");
$route->get("/to_manager/{user_id}/chat/photos/{search}/{page}", "Students:UploadPhotos");

/** Vídeos */
$route->get("/to_manager/{user_id}/chat/videos", "Students:UploadVideos");
$route->post("/to_manager/{user_id}/chat/videos", "Students:UploadVideos");
$route->get("/to_manager/{user_id}/chat/videos/{search}/{page}", "Students:UploadVideos");

/** Training Sheet */
$route->get("/to_manager/{user_id}/training_sheet", "TrainingSheets:TrainingSheet");
$route->post("/to_manager/{user_id}/training_sheet", "TrainingSheets:TrainingSheets");
$route->get("/to_manager/{user_id}/training_sheet/{training_sheet_id}/trainings/{training_id}", "TrainingSheets:Trainings");
$route->post("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises", "TrainingSheets:Training");
$route->post("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/update", "TrainingSheets:update");
$route->post("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/order", "TrainingSheets:TrainingOrder");
$route->get("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/sunday", "TrainingSheets:ExercisesSunday");
$route->get("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/monday", "TrainingSheets:ExercisesMonday");
$route->get("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/tuesday", "TrainingSheets:ExercisesTuesday");
$route->get("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/wednesday", "TrainingSheets:ExercisesWednesday");
$route->get("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/thursday", "TrainingSheets:ExercisesThursday");
$route->get("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/friday", "TrainingSheets:ExercisesFriday");
$route->get("/to_manager/{user_id}/training_sheet/{training_sheet_id}/exercises/saturday", "TrainingSheets:ExercisesSaturday");
$route->post("/to_manager/{training_sheet_id}/change_status", "TrainingSheets:changeStatus");

$route->get("/to_manager/{user_id}/anamnese", "TrainingSheets:anamnese");
$route->get("/to_manager/{user_id}/postural_evaluation", "TrainingSheets:postural_evaluation");
$route->get("/to_manager/{user_id}/par_q", "TrainingSheets:par_q");

/** posture analysis */
$route->get("/to_manager/{user_id}/postural_analysis/{postural_analysis_id}/posture_analysis", "TrainingSheets:posture_analysis");
$route->post("/to_manager/{user_id}/postural_analysis/{postural_analysis_id}/posture_analysis", "PostureAnalysisReports:posture_analysis_reports_create");

/** postural analysis images */
$route->get("/to_manager/{user_id}/postural_analysis_images", "TrainingSheets:postural_analysis_images");
$route->post("/create_postural_analysis_images/{user_id}", "TrainingSheets:postural_analysis_images");
$route->post("/delete_postural_analysis_images/{user_id}", "TrainingSheets:exclude_postural_analysis");

/** Training Exercises */
$route->post("/trainingExercises", "TrainingExercises:Exercises");

/** Categories */
$route->get("/muscle_groups", "MuscleGroup:muscleGroups");
$route->post("/muscle_groups", "MuscleGroup:muscleGroups");
$route->post("/muscle_groups/{muscle_group_id}", "MuscleGroup:muscleGroupsDelete");
$route->get("/muscle_groups/{search}/{page}", "MuscleGroup:muscleGroups");
$route->post("/muscle_groups/muscle_group", "MuscleGroup:muscleGroup");

/** Training */
$route->get("/exercises", "Exercises:exercise_list");
$route->post("/exercises", "Exercises:exercise_list");
$route->get("/exercises/{search}/{page}", "Exercises:exercise_list");
$route->post("/exercises/exercise", "Exercises:exercisePost");
$route->get("/exercises/view/{exercise_id}", "Exercises:exercise_view");
$route->get("/exercises/{exercise_id}/muscle_groups", "Exercises:muscle_groups_exercise_list");
$route->post("/exercises/{exercise_id}/muscle_groups", "Exercises:muscle_groups_exercise");

/** Physical Form */
$route->get("/physical-form", "App:physical_form");
$route->post("/physical-form", "App:physical_form");

/** Chat */
$route->post("/chat-insert", "Chat:insert");
$route->post("/chat-get/{user_id}", "Chat:get");
$route->post("/chat-get/{user_id}/file", "Chat:uploads");
$route->post("/chat-get/{user_id}/test", "Chat:files_upload");

/** Warnings */
$route->get("/warnings", "Warnings:warnings");
$route->post("/warnings", "Warnings:warnings");
$route->get("/warnings/{search}/{page}", "Warnings:warnings");
$route->post("/warnings/warning", "Warnings:warning");

/** Partnerships */
$route->get("/partnerships", "Partnerships:partnerships");
$route->post("/partnerships", "Partnerships:partnerships");
$route->get("/partnerships/{search}/{page}", "Partnerships:partnerships");
$route->post("/partnerships/partnership", "Partnerships:partnership");

/** Blogs Category */
$route->get("/blog_categories", "BlogCategories:categories");
$route->post("/blog_categories", "BlogCategories:category");
$route->get("/blog_categories/{search}/{page}", "BlogCategories:categories");

/** Blogs */
$route->get("/blogs", "Blogs:blogs");
$route->get("/blogs/create", "Blogs:blogCreate");
$route->post("/blogs/create", "Blogs:blogCreate");
$route->get("/blogs/update/{id}", "Blogs:blogUpdate");
$route->post("/blogs/update/{id}", "Blogs:blogUpdate");
$route->post("/blogs/delete", "Blogs:blogDelete");

/** Events */
$route->get("/events", "Events:events");
$route->get("/events/{start_date}/{end_date}", "Events:events");
$route->post("/events/filter", "Events:eventsFilter");
$route->post("/events/event", "Events:event");

/** Birthday Messages */
$route->get("/birthday_message", "BirthdayMessages:message");
$route->post("/birthday_message", "BirthdayMessages:message");

/** Intensification Methods */
$route->get("/intensification_methods", "IntensificationMethods:intensification_methods");
$route->post("/intensification_methods", "IntensificationMethods:intensification_methods");

/** Requests */
$route->get("/requests", "Requests:requests");
$route->post("/requests", "Requests:status");

/** Position */
$route->post("/training/position", "TrainingSheets:positions");
$route->post("/postural_analysis/position", "TrainingSheets:positionPosturalAnalysis");

/** Depositions */
$route->get("/depositions", "Depositions:depositions");
$route->post("/depositions/create", "Depositions:create");
$route->post("/depositions/update", "Depositions:update");
$route->post("/depositions/delete", "Depositions:delete");

/** Clone Exercise */
$route->post("/clone_exercise", "TrainingSheets:CloneExercise");
$route->post("/clone_training", "TrainingSheets:CloneTraining");

/** New Students */
$route->get("/new_students", "NewStudents:index");
$route->post("/new_students/students", "NewStudents:students");

/** Notifications */
$route->get("/notifications", "ChatNotifications:notifications");
$route->post("/alert", "ChatNotifications:alert");
$route->post("/alertRequest", "ChatNotifications:alertRequest");
$route->post("/alertPostural", "ChatNotifications:alertPostural");

/** Evolutions */
$route->post("/evolution", "LoadEvolutions:createAndUpdate");

/** TrainingSheet Observation */
$route->post("/observationUpdate", "ObservationCreate:createObservation");

/** Message History */
$route->get("/messageHistory", "MessageHistory:messageHistory");

/** Postural Evaluation Status */
$route->post("/avaliado", "PosturalEvaluations:avaliado");
$route->post("/naoAvaliado", "PosturalEvaluations:naoAvaliado");

/** Pending Postural Assessments */
$route->get("/pending_postural_assessments", "PendingPosturalAssessments:index");

/**
 * ERROR ROUTES
 */
$route->group(null);
$route->get("/", "Web:home");
$route->get("/login", "Login:login");
$route->post("/login", "Login:login");

/** Recover */
$route->get("/recover", "Web:recover");
$route->post("/recover", "Web:recover");
$route->get("/recover/{code}", "Web:reset");
$route->post("/recover/reset", "Web:reset");

/** Landing Page */
$route->get("/landing_page", "Web:landingPage");
$route->get("/landing_page2", "Web:landingPage2");

/** Blogs */
$route->get("/blog", "Web:blog");
$route->get("/blog/p/{page}", "Web:blog");
$route->get("/blog/{uri}", "Web:blogPost");
$route->get("/blog/em/{category_id}", "Web:blogCategory");
$route->get("/blog/em/{category_id}/{page}", "Web:blogCategory");

/** Forms */
$route->get("/par_q/{user_id}", "Web:par_q");
$route->get("/anamnese/{user_id}", "Web:anamnese");
$route->get("/avaliacao_postural/{user_id}", "Web:avaliacao_postural");
$route->post("/forms", "Web:forms");

$route->get("/formControl/{user_id}", "Web:formControl");

/** Plans */
$route->get("/plans", "Web:plans");


$route->namespace("Source\Controllers");

$route->group("/ops");
$route->get("/{errcode}", "Web:error");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
  $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
