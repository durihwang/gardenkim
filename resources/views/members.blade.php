<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>gardenkim</title>
</head>
<body>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">이름</th>
        <th scope="col">전화번호</th>
        <th scope="col">4대보험여부</th>
        <th scope="col">연봉</th>
        <th scope="col">총 부채금액</th>
        <th scope="col">최근 연체 여부</th>
        <th scope="col">일자</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($members as $member)
        <tr>
            <th>{{$member->name}}</th>
            <th>{{$member->phone}}</th>
            <th>{{ $member->insurance }}</th>
            <th>{{ number_format((float)$member->income) }}</th>
            <th>{{ number_format((float)$member->loan_amount)}}</th>
            <th>{{$member->overdue}}</th>
            <th>{{$member->created_at}}</th>
        </tr>
    @endforeach
    </tbody>
</table>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
