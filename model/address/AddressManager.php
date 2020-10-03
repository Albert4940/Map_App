<?php

//use jjjp\stock_management\model;

class AddressManager
{
    private $_db;

    public function __construct( PDO $db ) 
    {
        $this->_db = $db;
    }

    /**
     * method to add a product
     */
    public function add( Address $address )
    {
        $request = $this->_db->prepare('INSERT INTO addresses 
        (address, country, city,zip_code)
        VALUES(:address, :country, :city, :zip_code)');

        $request->bindValue(':address', $address->address());
        $request->bindValue( ':country', $address->country());
        $request->bindValue( ':city', $address->city());
        $request->bindValue( ':zip_code', $address->zip_code());
        
        $res = $request->execute();
        return 'success';
    }


    public function get(Address $address)
    {
        $q = $this->_db->prepare("SELECT * FROM addresses where address = :address AND city = :city AND country = :country AND zip_code = :zip_code");
            $q->execute(array(
                ':address' => $address->address(),
                ':city' => $address->city(),
                ':country' => $address->country(),
                'zip_code' => $address->zip_code()
            ));
            $list = [];

            while($data = $q->fetch(PDO::FETCH_ASSOC)){
                $list[] = $data;
            }
           return $list;
    }

    /**
     * list a specific product
     * return the product 
     */
    public function getUnique($info)
    {
        if (is_int($info))
        {
            if($this->exists($info) )
            {
                $sql = 'SELECT * FROM product_base RIGHT JOIN product USING(product_base_id)
                    WHERE product_base_id = :product_base_id';

                    $q = $this->_db->prepare($sql);

                    $q->bindValue(':product_base_id', (int) $info, \PDO::PARAM_INT);
                        $q->execute();
        

                    $product = $q->fetch(\PDO::FETCH_ASSOC);
            
                //return new Product( $product ); 
                    return $product;
            }
            else{
                //throw new \Exception('Ce produit n\'existe pas!');
                return "Ce produit n'existe pas!";
            }
        }
        else{
            //throw new \InvalidArgumentException('Un entier est requit!');
            return "Un entier est requit!";
        }
    }

    /**
     * update a product
     */
    public function update(Product $product)
    {
        $res = 0;
        $sql = 'UPDATE product_base SET product_name = :product_name, product_category = :product_category, product_model = :product_model
        WHERE product_base_id = :product_base_id';

        $sql_1 = 'UPDATE product SET price = :price, product_comment = :product_comment, creation_date = NOW(),
            product_quantity = :product_quantity, sale_price_percent = :sale_price_percent, 
            sale_price = :sale_price WHERE product_base_id = :product_base_id';


        $request = $this->_db->prepare($sql);
        $request_1 = $this->_db->prepare($sql_1);

        $request->bindValue( ':product_base_id', $product->product_base_id(), PDO::PARAM_INT );
        $request->bindValue( ':product_name', $product->product_name() );
        $request->bindValue( ':product_category', $product->product_category() );
        $request->bindValue( ':product_model', $product->product_model() );

        if( $request->execute() or die( print_r( $this->_db->errorInfo() ) ) )
        {
            $request_1->bindValue( ':product_base_id', $product->product_base_id() , PDO::PARAM_INT );
            $request_1->bindValue( ':price', $product->price() );
            $request_1->bindValue( ':product_comment', $product->product_comment() );
            $request_1->bindValue( ':product_quantity', $product->product_quantity(), PDO::PARAM_INT ); 
            $request_1->bindValue( ':sale_price_percent', $product->sale_price_percent() );
            $request_1->bindValue( ':sale_price', $product->sale_price() );
            //$request->bindValue( ':product_color', $product->product_color() );

            if( $request_1->execute() )
            {
                $res = 'success';
            }
            else{
                $res = 0;
            }
        }
        else
        {
            $res = 0;
        }
        
        return $res;

    }
}