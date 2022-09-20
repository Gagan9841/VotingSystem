<?php 
             include "connection.php";
            //  $sql = "Select * from voting_list where end>=now()";
             $sql = "SELECT * FROM vote left join voting_list on vote.votingId = voting_list.votingId WHERE resultStatus=1 GROUP BY name;";
            // $sql="select * from candidate_list left join voting_list on voting_list.votingId= candidate_list.votingList left join category_list on category_list.category_Id=candidate_list.categoryList where end>=now()";
             $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){          
                        echo "<li> <a href =\"publishresult.php?vid=".$row['votingId']."\">".$row['name']."</a> 
                </li>";
                            }
                }
                else {
                   echo"<li style=\"color:yellow\">"."Result not Published"."</li>";
                }
                  
?>
