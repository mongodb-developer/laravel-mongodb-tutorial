<!-- 

Objects with nested data can get here fine, directly from MongoDB

MongoDB dates

"mdb_post_date_gmt": {
"$date": {
"$numberLong": "1450836363000"
}
},



-->


<!DOCTYPE html>
<html>
<head>
   <title>Post Page</title>
</head>
<body>
   <h1>{{$post_data->post_title}}</h1>

   <!-- syntax below as $post_data->post_content is RAW HTML -->
   <div>{!! $post_data->post_content !!}</div>

   <div>{{ $post_data->mdb_post_date }}</div>
   
   <!-- 
      access an element in an array of objects
      you have to treat the mdb_post_taxonomies 'object' as an 'array'
   -->
   <div>First Taxonomy: {{ $post_data->mdb_post_taxonomies[0]['name'] }}</div>   

   <div>RAW Object: {{$post_data}}</div>
</body>
</html>