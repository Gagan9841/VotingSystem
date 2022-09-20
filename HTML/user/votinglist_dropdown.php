<?php 
             include "connection.php";
             $sql = "Select * from voting_list where end>=now()";
            // $sql="select * from candidate_list left join voting_list on voting_list.votingId= candidate_list.votingList left join category_list on category_list.category_Id=candidate_list.categoryList where end>=now()";
             $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                    while($row = mysqli_fetch_assoc($res)){          
                        echo "<li> <a href =\"votenow.php?votingId=".$row['votingId']."\">".$row['name']."</a> 
                </li>";            
                            }
                }
                else {
                   echo"<li style=\"color:yellow\">"."Voting has not started"."</li>";
                }
                  
?>
