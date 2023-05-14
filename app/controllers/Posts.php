<?php

class Posts {

    public function __construct() {
        echo "initialize any necessary variables here\n";
    }

    public function index() {
        echo 'handle displaying a list of all posts here';
    }

    public function show($id) {
        echo 'handle displaying the details of a specific post here.' . $id;
    }


    public function create() {
        echo 'handle displaying a form for creating a new post here';
    }

    public function store() {
        echo 'handle processing the form data and creating a new post here';
    }

    public function edit($id) {
        echo 'handle displaying a form for editing an existing post here';
    }

    public function update($id) {
        echo 'handle processing the form data and updating the specified post here';
    }

    public function destroy($id) {
        echo 'handle deleting the specified post here';
    }
}