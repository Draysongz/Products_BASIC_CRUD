$url='https://jsonplaceholder.typicode.com/users';

<!-- $resource= curl_init($url);

curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($resource)
echo $result -->
<!-- curl_close() -->

$user = [
    'name'=>'John Doe',
    'username'=>'John',
    'email'=>'john@example.com'

    ];

$resource =curl_init();
curl_setopt_array($resource, [
    CURLOPT_URL => $url'
    CURLOPT_RETURNTRANSFER=> true,
    CURLOPT_HTTPHEADER=>['content-type: Applicayion/json'],
    CURLOPT_POST=> true,
    CURLOPT_POSTFIELDS=> json_encode($user)
    ]);
$result= curl_exec($resource);

curl_close();