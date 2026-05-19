<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TaskFlow</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#0f172a,#1e293b,#334155);
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.container{
    width:100%;
    max-width:700px;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(10px);
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    color:white;
}

h1{
    text-align:center;
    font-size:40px;
    margin-bottom:10px;
}

.subtitle{
    text-align:center;
    margin-bottom:30px;
    color:#cbd5e1;
}

form{
    display:flex;
    gap:10px;
    margin-bottom:30px;
}

input{
    flex:1;
    padding:15px;
    border:none;
    border-radius:12px;
    font-size:16px;
    outline:none;
}

button{
    padding:15px 20px;
    border:none;
    border-radius:12px;
    background:#38bdf8;
    color:white;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#0ea5e9;
    transform:translateY(-2px);
}

.task{
    background:rgba(255,255,255,0.1);
    padding:18px;
    border-radius:14px;
    margin-bottom:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    transition:0.3s;
}

.task:hover{
    transform:scale(1.02);
}

.delete-btn{
    text-decoration:none;
    background:#ef4444;
    color:white;
    padding:10px 15px;
    border-radius:10px;
}

.delete-btn:hover{
    background:#dc2626;
}

.empty{
    text-align:center;
    color:#cbd5e1;
    padding:20px;
}
</style>
</head>

<body>

<div class="container">
    <h1>TaskFlow</h1>
    <p class="subtitle">Interactive PHP & MySQL Task Manager</p>

    <form method="POST" action="add.php">
        <input type="text" name="task" placeholder="Enter a task..." required>
        <button type="submit">Add Task</button>
    </form>

    <?php
    $result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "
            <div class='task'>
                <span>".$row['task']."</span>
                <a class='delete-btn' href='delete.php?id=".$row['id']."'>Delete</a>
            </div>";
        }
    } else {
        echo "<div class='empty'>No tasks available.</div>";
    }
    ?>
</div>

</body>
</html>
