<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP OOP - CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<section>
    <h3>Form</h3>
    
    <form id="form" onsubmit="event.preventDefault(); sumbitForm();">
        <input type="hidden" name="id" />
        <input type="text" name="name" placeholder="Name" />
        <input type="number" name="age" placeholder="Age" />
        <input type="text" name="course" placeholder="Course" />
        <button type="submit">Submit</button>
        <button type="button" onclick="clearForm()">Clear</button>
    </form>

</section>
<br/>

<section>
    <h3>List</h3>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Course</td>
                <td>Age</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody id="table-content">

        </tbody>
    </table>
</section>


<script>
    (function() {
        // initialize student list
        getList();
    }());

    let onCreate = true;
    const tableContent = document.querySelector("#table-content");

    const 
        $id = document.querySelector("input[name='id']"),
        $name = document.querySelector("input[name='name']"),
        $age = document.querySelector("input[name='age']"),
        $course = document.querySelector("input[name='course']");

    function getList() {
        fetch('list.php').then(res => {
            return res.json();
        })
        .then(data => {
            tableContent.innerText = "";

            // iterate the result and display in table row element
            data.forEach((item) => {
                var tableRow = document.createElement("tr");

                // iterate properties in object and display in `td` element
                for (let key in item) {
                    var tableData = document.createElement("td");
                    tableData.innerText = item[key];

                    tableRow.appendChild(tableData);
                }
                
                // setup action cell column
                var actionData = document.createElement("td");

                // create edit button element
                var editButton = document.createElement("button");
                editButton.innerText = "Edit";
                editButton.onclick = function () { setDetails(item['id']); };
                
                // create delete button element
                var deleteButton = document.createElement("button");
                deleteButton.innerText = "Delete";
                deleteButton.onclick = function () { deleteData(item['id']); };
                
                // append the create & edit button in single table cell
                actionData.appendChild(editButton);
                actionData.appendChild(deleteButton);

                // append the two action buttons in last column
                tableRow.appendChild(actionData);

                tableContent.appendChild(tableRow);
            }) 
        });
    }
    
    function create() {
        const data = generateFormData();

        // send a post request to create new data
        fetch('create.php', {
            method: 'POST',
            body: data
        })
        .then(() => {
            console.log('student has been created!');

            clearForm();
            getList();
        })
    }

    function setDetails(id) {

        fetch(`details.php?id=${id}`)
        .then(res => {
            return res.json();
        })
        .then(data => {
            onCreate = false;
            $id.value = data.id;
            $name.value = data.name;
            $age.value = data.age;
            $course.value = data.course;
        })
    }

    function update() {
        const data = generateFormData();

        fetch('update.php', {
            method: 'POST',
            body: data
        })
        .then(() => {
            onCreate = true;
            clearForm();
            getList();
        })
    }

    function deleteData(id) {
        let result = confirm('are you sure you want to delete this?');

        if (!result) return;

        let formData = new FormData();
        formData.append('id', id);

        fetch('delete.php', {
            method: 'POST',
            body: formData,
        })
        .then(() => {
            getList();
        })
    }

    // serialize all form inputs into `formData`
    function generateFormData() {
        let formData = new FormData();

        formData.append('id', $id.value);
        formData.append('name', $name.value);
        formData.append('age', $age.value);
        formData.append('course', $course.value);

        return formData;
    }

    function clearForm() {
        $id.value = "";
        $name.value = "";
        $age.value = "";
        $course.value = "";
        onCreate = true;
    }

    function sumbitForm() {

        if (onCreate) {
            create();
        } else {
            update();
        }

        return true;
    }
</script>

</body>
</html>