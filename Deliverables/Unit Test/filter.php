<?php

namespace App;

class Filter {
    function getListings($conn, $query, $data)
    {
        // prepare statement
        $stmt = $conn->prepare($query);

        foreach ($data as $key => $value)
    {
            $stmt->bindParam($key, $data[$key]);
        }

        // get listings db as array
        $stmt->execute();
        $listingsStmt = $stmt->fetchAll();

        $images = array();//getImagesForListings($conn);

        $listings = array();

        for ($listing = 0; $listing < count($listingsStmt); $listing++)
        {
            // create listing object
            $newListing = new Listing($listingsStmt[$listing][1],$listingsStmt[$listing][2],$listingsStmt[$listing][3],$listingsStmt[$listing][4],$listingsStmt[$listing][5],$listingsStmt[$listing][6],$listingsStmt[$listing][7], $listingsStmt[$listing][8]);

            for ($image = 0; $image < count($images); $image++)
            {
                if ($images[$image]->address === $newListing->address)
                {
                    $newListing->addImage($images[$image]);
                }
            }

            // push new listing object to listings array
            array_push($listings, $newListing);
        }

        return $listings;
    }
}