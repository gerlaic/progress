<?php
	include("common.php");
	top();
	session_start();
	$name=$_SESSION["name"];
	//$password=$_SESSION["password"];
	$pFilename="pb_".$name.".sj";
	$gFilename="pb_group.sj";

	//get the events
	$pTodo=file($pFilename,FILE_IGNORE_NEW_LINES);
	$gTodo=file($gFilename,FILE_IGNORE_NEW_LINES);
	
	
	$pCount=count($pTodo);
	$gCount=count($gTodo);
	$sCount=$pCount+$gCount;
	
	//print($gCount);
	//print($pCount);
	
	$i=array();
	$i[0]=0;
	$i[1]=0;
	
	
?>
		<div id="main">
        
        	
			<h2>Team TB's To-Do List</h2>

			<ul id="todolist">
            	<?php
				foreach ($gTodo as $item) {
					$listitem=explode("|",$item);
					if ($listitem[1]=="uc") {
				?>
                    <li>
                        <form action="submit.php" method="post">
                            <input type="hidden" name="action" value="group_complete" />
                            <input type="hidden" name="index" value="<?= $i[0] ?>" />
                            <input type="submit" value="Complete" />
                        </form>
                        <?=$listitem[0]?>
                    </li>		
				<?php 
					}
					$i[0]++;
				}
				?>
				
				<!--add-->
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="group_add" />
						<input name="item" type="text" size="25" autofocus="autofocus" />
						<input type="submit" value="Add" />
					</form>
				</li>
			</ul>

			<h2><?=$name?>'s To-Do List</h2>

			<ul id="todolist">
            	<?php
				foreach ($pTodo as $item) {
					$listitem=explode("|",$item);
					if ($listitem[1]=="uc") {
				?>
                    <li>
                        <form action="submit.php" method="post">
                            <input type="hidden" name="action" value="person_complete" />
                            <input type="hidden" name="index" value="<?= $i[1] ?>" />
                            <input type="submit" value="Complete" />
                        </form>
                        <?=$listitem[0]?>
                    </li>		
				<?php 
					}
					$i[1]++;
				}
				?>
				
				<!--add-->
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="person_add" />
						<input name="item" type="text" size="25" autofocus="autofocus" />
						<input type="submit" value="Add" />
					</form>
				</li>
			</ul>

			<h2>Team TB has complete these: </h2>
			<ul id="comList">
            	<?php
				foreach ($gTodo as $item) {
					$listitem=explode("|",$item);
					if ($listitem[1]=="c") {
				?>
                    <li>
                        <?=$listitem[0]?>
                    </li>		
				<?php 
					}
				}
				?>	
				
			</ul>
            
            <h2><?=$name?> has competed these: </h2>
            
            <ul id="comList">
            	<?php
				foreach ($pTodo as $item) {
					$listitem=explode("|",$item);
					if ($listitem[1]=="c") {
				?>
                    <li>
                        <?=$listitem[0]?>
                    </li>		
				<?php 
					}
				}
				?>
			</ul>
			

            
            

		</div>

<?php
	bottom();
?>