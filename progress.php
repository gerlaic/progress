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
	
	
	
	$i=0;
	
?>
		<div id="main">
        
        
			<h2><?=$name?>'s To-Do List</h2>

			<ul id="todolist">
            	<?php
				foreach ($pTodo as $item) {
					$listitem=explode("|",$item);
					if ($listitem[1]=="uc") {
				?>
                    <li>
                        <form action="submit.php" method="post">
                            <input type="hidden" name="action" value="complete" />
                            <input type="hidden" name="index" value="<?= $i ?>" />
                            <input type="submit" value="Complete" />
                        </form>
                        <?=$listitem[0]?>
                    </li>		
				<?php 
					}
					$i++;
				}
				?>
				
				<!--add-->
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="add" />
						<input name="item" type="text" size="25" autofocus="autofocus" />
						<input type="submit" value="Add" />
					</form>
				</li>
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