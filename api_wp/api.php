<!-- les requetes -->
<?php
// normalement on recupere les données de bases et on les transforme.
// ici on as déja le JSON ?
function getPosts() {
    $url = 'http://localhost/wordpress2/wp-json/wp/v2/posts';
    $json = header('Location: ' . $url);//je suis sur le JSON
    sendJSON($json);
}

function getPost($id) {
    $url = 'http://localhost/wordpress2/wp-json/wp/v2/post/' . $id;
    $json = header('Location: ' . $url);//je suis sur le JSON
    sendJSON($json);
}

function sendJSON($infos){
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}


//GET Product details
// app.get("/product/:productId", async (req, res) => {
//     const { productId } = req.params;
//     const { api_key } = req.query;
//     try {
//       const response = await request(
//         `${generateScraperUrl(api_key)}&url=https://www.amazon.com/dp/${productId}`
//       );
//       res.json(JSON.parse(response));
//     } catch (error) {
//       res.json(error);
//     }
//   });