<?php
    class Job {
        private $title;
        private $company;
        private $description;

    function __construct($title, $company, $description) {
        $this->title = $title;
        $this->company = $company;
        $this->description = $description;
    }

    function setTitle($new_title) {
        $this->title = $new_title;
    }

    function setCompany($new_company) {
        $this->company = $new_company;
    }

    function setDescription($new_description) {
        $this->description = $new_description;
    }

    function getTitle() {
        return $this->title;
    }

    function getCompany() {
        return $this->company;
    }

    function getDescription() {
        return $this->description;
    }

    function saveJob() {
        array_push($_SESSION['list_of_jobs'], $this);
    }

    static function getAll() {
        return $_SESSION['list_of_jobs'];
    }
}

?>
