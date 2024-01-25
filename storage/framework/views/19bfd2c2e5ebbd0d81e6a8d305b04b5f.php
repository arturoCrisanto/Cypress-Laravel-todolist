<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="min-vh-100">
    <div class="container">
        <h1 class="text-center pt-4 text-white fw-bold">TODO list</h1>
        <form action="/store" method="POST" class="input-group w-75 mx-auto mt-4">
            <?php echo csrf_field(); ?>
            <input type="text" class="form-control border border-dark rounded" placeholder="Todo" name="content"
                aria-label="Recipient's username with two button addons">
            <button class="btn btn-outline-primary rounded mx-2" type="submit"><img class="img"
                    src="images/add_icon.png" alt="Add Icon"></button>
            <button class="btn btn-outline-danger rounded" id="delete-btn" type="button"><img class="img"
                    src="images/delete_icon.png" alt="Delete Icon"></button>
        </form>

        <form id="form" action="/delete" method="POST" class="w-75 mx-auto mt-5">
            <?php echo csrf_field(); ?>            
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label for="<?php echo e($data->id); ?>" class="p-2 mb-2 rounded bg-dark text-white rounded-4 d-flex"
                    style="cursor: pointer">
                    <input id="<?php echo e($data->id); ?>" type="checkbox" class="me-3" data="check" value="<?php echo e($data->id); ?>" name="checked[]" onchange="check()">
                    <p id="data_<?php echo e($data->id); ?>" class="fw-bold fs-5" style="text-align: justify"><?php echo e($data->content); ?></p>
                </label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.halo.min.js"></script>
<script>
VANTA.HALO({
  el: "body",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00
})
</script>

<script>
    var delete_btn = document.getElementById('delete-btn');
    var checkbox = document.querySelectorAll('input[data="check"]');

    delete_btn.addEventListener('click', () => {
        var form = document.getElementById('form');
        form.submit();        
    });

    function check() {
        checkbox.forEach(element => {
            if (element.checked) {                
                document.getElementById('data_' + element.value).className = 'fw-bold fs-5 text-decoration-line-through text-danger'
            } else {
                document.getElementById('data_' + element.value).className = 'fw-bold fs-5'
            }
        })
    }

</script>

</html>
<?php /**PATH /home/mec369/Documents/Code/todo-list-laravel/resources/views/todo.blade.php ENDPATH**/ ?>