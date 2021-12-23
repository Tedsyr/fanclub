    
    <?php
        $title = 'Edit Record';
        require_once 'includes/header.php'; 
        require_once 'db/conn.php';

        $results = $crud->getTofs();

        if(!isset($_GET['id']))
        {
            //echo 'error';
            include 'includes/errormessage.php';
            header("Location: viewrecords.php");
        }
        else{
            $id = $_GET['id'];
            $fan = $crud->getFanDetails($id);
                
    ?>
    
         
        <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $fan['fan_id'] ?>" />
        <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $fan['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $fan['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="form-check">
            <label for="gender">Sex</label>
            <input type="radio" class="form-control" value ="<?php echo $fan['sex'] ?>" id="sex" name="sex"  >
            
        </div>
        <div class="mb-3">
            <label for="yard" class="form-label">Address</label>
            <input type="text" class="form-control" value="<?php echo $fan['yard'] ?>" id="yard" name="yard">
        </div>
        <div class="mb-3">
            <label for="tof" class="form-label">Type Of Fan</label>
        <select class="form-control" id="tof" name="tof">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['tof_id'] ?>" <?php if($r['tof_id']==
                    $photographer['tof_id']) echo 'selected' ?>>
                    <?php echo $r['tof']; ?>
                </option> 
                <?php }?> 
        </select>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date Of Birth</label>
            <input type="text" class="form-control" value="<?php echo $fan['dateofbirth'] ?>" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $fan['emailaddress'] ?> "id="email" aria-describedby="emailHelp" name="email" readonly>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $fan['contactnumber'] ?>" id="phone" aria-describedby="phoneHelp" name="phone">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
    
            <a href="viewrecords.php" class="btn btn-default">Back To List</button>
            <button type="submit" name="submit" button class="btn btn-success" >Save Changes</button>
        </div>    
    </form>   

    <?php } ?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>