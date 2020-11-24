<div class="mylist">
    <div class="list">
        <div class="item">
        <?php
        //from products
        if(isset($this->oProducts)){
        foreach ($this->oProducts as $product){
        ?>
        <div><h2>Name: <?=$product->strName?></h2></div>
        <?php
        }
        }
        ?>
        <?php
        //from ordersproducts
        if(isset($this->oOrders)){
        foreach ($this->oOrders as $order){
        ?>
        <p>Id: <?=$order->id?></p>
        <p>userId: <?=$order->userId?></p>
        <p>OrderId: <?=$order->orderId?></p>
        <p>productId: <?=$order->productId?></p>
        <p>quantity: <?=$order->quantity?></p>
        <p>total: <?=$order->total?></p>
        <?php
        }
        }
        ?>
        <?php
        //from orders
        if(isset($this->oOrders1)){
            //print_r($this->oOrders1);
        foreach ($this->oOrders1 as $order1){
        ?>
        <p>Id: <?=$order1->id?></p>
        <p>userId: <?=$order1->userId?></p>
        <p>total cart: <?=$order1->totalCart?></p>
        <p>total amount: <?=$order1->totalAmount?></p>
        <p>date: <?=$order1->date?></p>
        <?php
        }
        }
        ?>
        </div>
    </div>
</div>
