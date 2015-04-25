<?php
require_once("includes/user.php");
require_once("includes/session.php");
require_once("includes/paper.php");
require_once("includes/paperassign.php");
require_once("includes/functions.php");



//
//if(!isset($_SESSION["ID"]) && !isset($_GET["ID"])){
//    redirect_to("conference.php");
//}

$query = "SELECT paper.ID,paper.paperName,paper.paperURL FROM paper INNER JOIN paperassign ON paper.ID = paperassign.paperID INNER JOIN user ON
          user.ID = paperassign.userID AND paperassign.confID = 1;";
//{$_GET["ID"]}
$papers = paper::find_by_sql($query);

            $c1 = 0;
            $array4 = array();
            foreach($papers as $result2){
                foreach($result2 as $key4) {
                    if (isset($key4)) {
                        $array4[$c1] = $key4;
                        $c1++;
                    }
                }
            }

            for($i = 0 ; $i<=$c1-1 ; $i+=3) {
                ?>
                    <p class="label label-primary">
                      <a href="paperReview.php?ID=<?php echo $array4[$i]?>">
                        <?php
                    echo $array4[$i];
                        echo "  ";
                        echo $array4[$i+1];
                        echo "  ";
                        echo $array4[$i+2];

                        ?>
                      </a>
                    </p>
                <?php
            echo "<br>";
            }

//href = "paperReview.php?ID={$_GET["ID"]}"
