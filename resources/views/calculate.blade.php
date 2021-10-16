<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel SAW</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Criteria</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Value</th>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($criterias as $key => $criteria)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $criteria->name }}</td>
                                <td>{{ $criteria->value }}</td>
                                <td>{{ $criteria->type }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12">
                <h1>Weight</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newCriterias as $key => $criteria)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $criteria['name'] }}</td>
                                <td>{{ $criteria['weight'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12">
                <h1>Normalization</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quality</th>
                            <th scope="col">Feature</th>
                            <th scope="col">Popular</th>
                            <th scope="col">After Sales</th>
                            <th scope="col">Strength</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($normalization as $key => $normaly)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $normaly['product_name'] }}</td>
                                <td>{{ $normaly['price'] }}</td>
                                <td>{{ $normaly['quality'] }}</td>
                                <td>{{ $normaly['feature'] }}</td>
                                <td>{{ $normaly['popular'] }}</td>
                                <td>{{ $normaly['after_sales'] }}</td>
                                <td>{{ $normaly['strength'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12">
              <h1>Result</h1>
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Weight</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($resultSorted as $key => $result)
                          <tr>
                              <td>{{ $key + 1 }}</td>
                              <td>{{ $result['product_name'] }}</td>
                              <td>{{ $result['result'] }}</td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

        </div>
    </div>
</body>

</html>
