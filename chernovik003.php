<?php

require_once ("chernovik001.php");

class books extends connect_db{
    public function addBook ($book_author, $book_title, $book_price) {
        $mysqli = $this->connect_db();
        $stmt = $mysqli->prepare("INSERT INTO books (book_author, book_title, book_price) VALUES (?, ?, ?)");
        $stmt->bind_param('ssd', $book_author, $book_title, $book_price);
        $stmt->execute();
        $stmt->close();
    }

    public function showBooksInTable ()
    {
        $mysqli = $this->connect_db();
        $stmt = $mysqli->prepare("SELECT id, book_author, book_title, book_price FROM books");
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function deleteBookInTable ($book_author) {
        $mysqli = $this->connect_db();
        $stmt = $mysqli->prepare("DELETE FROM books WHERE book_author=?");
        $stmt->bind_param('s', $book_author);
    }

    public function deleteBookInTable001 ($id) {
        
        if(isset($_POST['button_delete_book'])) {
            $mysqli = $this->connect_db();
            $stmt = $mysqli->prepare("DELETE FROM books WHERE id=?");
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

$object002 = new books();
//$object002->addBook("Carlos Castaneda", "Книга 12", "13.40");
$books = $object002->showBooksInTable();

?>



<table border="1">
    <tr>
        <th>id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($books as $book) { ?>
        <tr>
        <form method="post">
            <th><?php echo $book['id']?></th>
            <th><?php echo $book['book_author']?></th>
            <th><?php echo $book['book_title']?></th>
            <th><?php echo $book['book_price']?></th>
            <th>
                <input type="submit" name="button_delete_book" value="Delete">
            </th>
        </tr>
        </form>
        <?php //$object002->deleteBookInTable001($book['id']); ?>
    <?php } ?>