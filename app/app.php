<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Job.php';

    session_start();
    if(empty($_SESSION['list_of_jobs'])) {
        $_SESSION['list_of_jobs'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=> __DIR__."/../views"));


    $app->get('/', function() use ($app) {
        return $app['twig']->render('index.html.twig', array('job'=>Job::getAll()));
    });

    $app->post('/job_list', function() use ($app) {
        $job = new Job($_POST['inputTitle'], $_POST['inputCompany'], $_POST['inputDescription']);
        $job->saveJob();
        return $app['twig']->render('job_list.html.twig', array('newjob'=> $job));
    });

    $app->get('/resume', function() use ($app) {
        return $app['twig']->render('resume.html.twig', array('jobs'=>Job::getAll()));
    });

    $app->post('/delete_jobs', function() use ($app){
        Job::deleteAll();
        return $app['twig']->render('unemployed.html.twig');
    });
    return $app;

 ?>
