nes (13 sloc) 228 Bytes

<?php
class User
{
    private array $cart = [];

    public function getCart()
    {
        return $this->cart;
    }

    public function addToCart(Product $product)
    {
        array_push($this->cart, $product);
    }
}
?>