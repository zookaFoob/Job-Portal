<?php
include("connection/db.php");

include('include/header.php');
include('include/sidebar.php');

?>

<style>
    label {
        font-size: 18px;
    }
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="job.php">Post A Job</a></li>
            <li class="breadcrumb-item"><a href="add_job.php">Add Job</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Job</h1><br>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
            </div>
        </div>
    </div>
    <div style="width: 60%; margin-left:20%; background-color:beige;">
        <form action="" style="margin:3%; padding:3%;" name="job_form" id="job_form" action="" method="POST">
            <div class="form-group">
                <label for="Job Title">Enter Job Title</label>
                <input type="text" name="jobTitle" class="form-control" placeholder="Enter Job Title">
            </div>

            <div class="form-group">
                <label for="Description">Enter Description</label>
                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" id="desc"></textarea>
            </div>

            <div class="form-group">
                <label for="Country">Enter Country</label>
                <select name="country" class="countries form-control" id="countryId">
                    <option value="">Select Country</option>
                </select>
            </div>

            <div class="form-group">
                <label for="State">Enter State</label>
                <select name="state" class="states form-control" id="stateId">
                    <option value="">Select State</option>
                </select>
            </div>

            <div class="form-group">
                <label for="City">Enter City</label>
                <select name="city" class="cities form-control" id="cityId">
                    <option value="">Select City</option>
                </select>
            </div>

            <div class="form-group">
                <input name="submit" id="submit" type="submit" class="btn btn-success" placeholder="SAVE">
            </div>
        </form>
        <div id='msg'></div>
    </div>
</main>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<!-- <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script> -->

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- datatables plugin -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $("#submit").click(function() {
            var jobTitle = $('#jobTitle').val();
            var desc = $('#desc').val();
            var country = $('#countryId').val();
            var state = $('#stateId').val();
            var city = $('#cityId').val();
            
            if (jobTitle == "") {
                alert('Please Enter a Job Title!')
                return false
            }
            if (desc == "") {
                alert('Please Enter a Description!')
                return false
            }
            if (country == "") {
                alert('Please Select a Country!')
                return false
            }
            if (state == "") {
                alert('Please Select a State!')
                return false
            }
            if (city == "") {
                alert('Please Select a City!')
                return false
            }
            
            var data = $("#job_form").serialize();
            $.ajax({
                type: "POST",
                url: "job_added.php",
                data: data,
                success: function(data) {
                    alert(data);
                }
            });
        });
    });
</script>

</body>

</html>