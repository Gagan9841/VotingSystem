<head>
    <title>Candidate List</title>
</head>
<?php
// session_start();

include "dashboard_ui.php";
if(isset($_SESSION['login_id']) && !empty($_SESSION['login_id'])) {
   $admin_user=$_SESSION['login_id'];
   
   ?>
<link rel="stylesheet" href="../../css/dashboard.css">
<link rel="stylesheet" href="../../css/voting_list.css">
<link rel="stylesheet" href="../../css/font-awesome-min.css">
<script src="../../js/all.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/font-awesome-min.js"></script>
<div class="backdrop">

    <?php
    if (isset($_GET["success"])) {
    ?>

        <div class="success" id="successMessage">
            <?php
            if (isset($_GET["success"])) {
                if (isset($_GET['success'])) {
                    echo "You are sucessfully registered.";
                }
            }
            ?>
            <?php
            if (isset($_GET['delete'])) { {
                    echo "Category deleted successfully.";
                }
            }
            ?>
        </div>
    <?php
    }
    ?>
    <div class="voters">
        <div class="add-btn">
            <button class="open-button" onclick="openForm()"><i class="fa-solid fa-plus"></i>&nbsp;Add
                Candidate</button>
        </div>
        <table class="voters-table" border="1" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Image</th>
                    <th>Candidate Name</th>
                    <th>Faculty</th>
                    <th>College Id</th>
                    <th>Voting List</th>
                    <th>Category List</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                $sql = "select * from candidate_list left join voting_list on voting_list.votingId= candidate_list.votingList left join category_list on category_list.category_Id=candidate_list.categoryList ORDER BY cid ";
                //  $sql = "SELECT * FROM candidate_list ORDER BY cid";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    $sn = 1;
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>" . $sn . "</td>";
                        echo "<td class='can-img'><img class='can-img-1'src='./img/$row[can_img]'></td>";
                        // echo'<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';            
                        echo "<td class='title'id= 'canName'><a>" . $row['cname'] . "</a></td>";
                        echo "<td>" . $row['cfaculty'] . "</td>";
                        echo "<td>" . $row['c-collegeId'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td id=\"td-action\"><form class=\"can_action\"method=\"POST\" action=\"deletecandidate.php?c-collegeId=" . $row['c-collegeId'] . "\">
                        <button type=\"submit\" onclick=\"return confirm('Are you sure you want to Delete?')\" class=\"del-btn\">
                        <i class=\"fa-solid fa-trash-can\"></i></button>
                        </form>
                        &nbsp;
                        <a href =\"editCandidate.php?c-collegeId=" . $row['c-collegeId'] . "&vid=".$row['votingId']."\"><i class=\"fa-regular fa-pen-to-square\"></i></a>
                       
                        &nbsp;<button \"class=\"del-btn\"><i class=\"fa-solid fa-circle-info\"></i></button>
                        </td>";
                        $sn++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="register-pane" id="myForm">

    <div class="close-pane">
        <input type="button" class="sbutton-cancel" value="X" onclick="closeForm()">
    </div>
    <form action="addCandidate.php" method="POST" enctype="multipart/form-data">
        <h1>Add Voting List</h1>
        <div class="form-group">
            <input type="text" name="cname" placeholder="Candidate Name" required>
        </div>

        <div class="form-group">
            <select name="cfaculty" required>
                <option value="1" disabled selected>--Select Faculty--</option>
                <option value="BBS">BBS</option>
                <option value="BBM">BBM</option>
                <option value="BCA">BCA</option>
                <option value="BIM">BIM</option>
                <option value="BBA">BBA</option>
                <option value="Bsc.Csit">BSc.Csit</option>
                <option value="MBS">MBS</option>
            </select>
        </div>
        <div class="form-group gender-group">
            <input type="radio" id="gender" name="cgender" value="Male" required> Male
            <input type="radio" id="gender" name="cgender" value="Female" required> Female
        </div>
        <span id="collegeid-error"></span>
        <div class="form-group">
            <input type="text" name="c-collegeId" placeholder="College Id No." required>
        </div>
        <div class="form-group">
            <textarea placeholder="Description" name="cdescription" id="description" class="form-group"></textarea>
        </div>
        <div class="form-group">
            Voting List:
            <select class="select_votingList" id="votingList" name="votingList" required>
                <option disabled selected>-- Select Voting List --</option>
                <?php
                $sql = "SELECT * FROM voting_list";
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<option value='" . $row['votingId'] . "'>" . $row['name'] . "</option>";  // displaying data in option menu
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            Category List:
            <select class="select_votingList" id="category" name="cat-list" required>
                <option disabled selected>-- Select Category List --</option>
            </select>
            <?php mysqli_close($conn);
            ?>
        </div>
        <div class="form-group">
            <input type="file" name="can_img">
            <input type="submit" class="sbutton" value="Submit" onclick="openSuccess()">
        </div>
    </form>
</div>
<div class="detail-popup">

    <!-- <link rel="stylesheet" href="../../css/can-detail.css"> -->
    <div class="main-container">
        <div class="can-detail">
            <div class="detail">
                <div class="close-pane">
                    <input type="button" onclick="closeForm()" class="sbutton-cancel" value="X">
                </div>
                <div class="image-detail">
                    <div class="can-image">
                        <img src="../../image/rep1.jpg" alt="no image found">
                    </div>

                    <div class="name">
                        <table>
                            <tr>
                                <th>Name:</th>
                                <?php
                                include "connection.php";
                                $sql = "SELECT * FROM candidate_list";
                                $res = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    $row = mysqli_fetch_array($res);
                                    echo "<td>" . $row['cname'] . "</td>";
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="can-detail-navbar">
                    <ul>
                        <li><a href="#">Description</a></li>
                        <li><a href="#">Agenda</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

</div>

<div class="overlay"></div>

</body>
</head>
<script src="../../js/jquery.js"></script>
<script>
    
    $(document).ready(function() {
    $('#votingList').on('change', function() {
        var voting_id = this.value;
        $.ajax({
            url: "fetch_category.php",
            type: "POST",
            data: {
                voting_id: voting_id
            },
            cache: false,
            success: function(result) {
                $("#category").html(result);
            }
        });
    });
});
setTimeout(openSuccess, 1000)

    function openSuccess() {
        document.getElementById("successMessage").style.display = "block";
    }
    $("#ed_endtimedate").change(function() {
        var startDate = document.getElementById("ed_starttimedate").value;
        var endDate = document.getElementById("ed_endtimedate").value;

        if ((Date.parse(endDate) <= Date.parse(startDate))) {
            alert("End date should be greater than Start date");
            document.getElementById("ed_endtimedate").value = "";
        }
    });

    </script>
<script>
    $(document).ready(function() {
        $('#canName').click(function() {
            console.log("Button Was Clicked");
            $('.detail-popup').css('display', 'block');
            $('.overlay').css('display', 'block');
        });
    });
    $('#editForm').click(function() {
        window.location.href = "editCandidate.php?c-collegeId="<?php $row['c-collegeId'] ?> ";
    });

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementsByClassName('backdrop')[0].style.display = 'flex';
    }
</script>

</html>
<?php
}
?>

    
    