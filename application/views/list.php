<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Allication - View User</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">Crud Application</a>
        </div>
    </div>
    <div class="container" style="padding-top: 10px;">
    <div class="row">
        <div class="col-md-12">
            <?php
            $success = $this->session->userdata('success');
            if($success != "") {
            ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
            <?php 
            } 
            ?>

            <?php
            $failure = $this->session->userdata('failure');
            if($failure != "") {
            ?>
            <div class="alert alert-success"><?php echo $failure; ?></div>
            <?php 
            } 
            ?>

        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6"><h3>View User</h3></div>
            <div class="col-md-6 text-right">
                <a href="<?php echo base_url().'index.php/User/create' ?>" class="btn btn-primary">Create</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php if(!empty($users)) { foreach($users as $user) { ?>
                <tr>
                    <td><?php echo $user['user_id'] ?></td>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td>
                        <a href="<?php echo base_url().'index.php/User/edit/'.$user['user_id'] ?>" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url().'index.php/User/delete/'.$user['user_id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } } else  ?> 
            </table>
        </div>
    </div>
    
    </div>
    
</body>
</html>