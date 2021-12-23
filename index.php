    
    <?php $title = 'Index';
     require_once 'includes/header.php'; 
     require_once 'db/conn.php';

     $results = $crud->getTofs();
    
    ?>
    
   
        <h1 class="text-center">Manchester United Fan Club Registration </h1>

    <form method="post" enctype="multipart/form-data" action="success.php">
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" value="male" id="male">
            <label class="form-check-label" for="male"> Male</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sex" value="female" id="female">
            <label class="form-check-label" for="female"> Female</label>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="yard" class="form-label">Address</label>
            <input required type="text" class="form-control" id="yard" name="yard">
        </div>
                
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="tof" class="form-label">Type of Fan </label>
        <select class="form-select" id="tof" name="tof">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['tof_id'] ?>"><?php echo $r['name']; ?></option> 
                <?php }?>
        </select>
        </div>
        
        </br>
        <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">Please Upload An Image Of Yourself</label>
            <small id="avatar" class="form-text text-danger">File Upload Is Optional</small>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" button class="btn btn-primary" >Submit Form</button>
            
        </div>

    </form>
    <br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>