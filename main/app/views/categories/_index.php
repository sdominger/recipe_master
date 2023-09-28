<ul class="list-reset text-gray-100">
    <?php foreach ($types_of_dishes as $type_of_dishe) : ?>
    <li>
        <a class="hover:text-white hover:bg-yellow-600 px-2 block" href="#">
            <?php echo $type_of_dishe['name']; ?>
        </a>
    </li>
    <?php endforeach ?>
<ul>