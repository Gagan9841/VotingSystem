
<link rel="stylesheet" href="../../css/voting_list.css">
<script src="../../js/jquery.js"></script>
<?php
include "connection.php";
?>
<?php
$id = $_GET['votingid'];
// $sql = "SELECT FROM `candidate_list` WHERE 'c-collegeId' = $can_id";
$sql = "SELECT * FROM `voting_list` WHERE `VotingId` = $id ";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
?>
        <div class="edit-register-pane" id="myForm">
            <div class="close-pane">
                <a href="voting_list.php" class="sbutton-cancel">Go Back</a>
                <!-- <button" class="sbutton-cancel" value="X" onclick="closeForm()"> -->
                <form action="updateVotingList.php?vid=<?php echo $row['votingId'] ?>" method="POST">
                    <h1>Add Voting List</h1>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" value="<?php echo $row['name']?>" required>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Description" name="description" id="description" class="form-group"><?php echo $row['description']?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="organizer"  value="<?php echo $row['organizer']?>"  placeholder="Organizer" required>
                    </div>
                    <div class="form-group">
                        Start Time
                        <input type="datetime-local" name="start"  value="<?php echo $row['start']?>" id="start_time" required>
                    </div>
                    <div class="form-group">
                        End Time
                        <input type="datetime-local"  value="<?php echo $row['end']?>"  name="end" id="end_time" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="sbutton" value="Submit" onclick="openSuccess()">
                    </div>
                </form>
            </div>
        </div>
<?php }
}


?>
