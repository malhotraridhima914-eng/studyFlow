<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Subject</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #F5F8FC;
        }

        .container {

            width: 90%;
            max-width: 550px;
            margin: 50px auto;

        }

        .subject-card {

            background: white;

            border-radius: 20px;

            padding: 35px;

            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);

        }

        .subject-card h2 {

            color: #1E293B;

            margin-bottom: 8px;

        }

        .subject-card p {

            color: #64748B;

            margin-bottom: 30px;

        }

        .input-group {

            margin-bottom: 22px;

        }

        .input-group label {

            display: block;

            margin-bottom: 8px;

            font-weight: 500;

            color: #334155;

        }

        .input-group input {

            width: 100%;

            padding: 14px 18px;

            border: 1px solid #CBD5E1;

            border-radius: 12px;

            outline: none;

            font-size: 15px;

            transition: .3s;

        }

        .input-group input:focus {

            border-color: #2563EB;

            box-shadow: 0 0 10px rgba(37, 99, 235, .15);

        }

        .btn {

            width: 100%;

            border: none;

            background: #2563EB;

            color: white;

            padding: 15px;

            border-radius: 12px;

            font-size: 16px;

            font-weight: 600;

            cursor: pointer;

            transition: .3s;

        }

        .btn:hover {

            background: #1D4ED8;

            transform: translateY(-3px);

        }
    </style>

</head>

<body>

    <div class="container">

        <div class="subject-card">

            <h2>
                <i class="fa-solid fa-book-open"></i>
                Add New Task
            </h2>

            <p>
                Create a Task and assign an exam date.
            </p>

            <form action="/task" method="POST">
                @csrf
            
                <div class="input-group">
            
                    <label>Task Name</label>
            
                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        placeholder="Example: Revise Aldehydes"
                        required>
            
                </div>
            
                <div class="input-group">
            
                    <label>Subject</label>
            
                    <select name="subject" required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->sub_name }}">
                                {{ $subject->sub_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                <div class="input-group">
            
                    <label>Due Date</label>
            
                    <input
                        type="date"
                        name="date"
                        id="date"
                        required>
            
                </div>
            
                <div class="input-group">
            
                    <label>Priority</label>
            
                    <select name="level" id="level">
            
                        <option>Low</option>
            
                        <option selected>Medium</option>
            
                        <option>High</option>
            
                    </select>
            
                </div>
            
                <button class="btn">
                    <i class="fa-solid fa-list-check"></i>
                    Add Task
                </button>
            
            </form>
    </div>

    </div>

</body>

</html>
