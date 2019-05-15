<!doctype html>
<html ng-app="form-demo-app">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style>
        table {
            width: 100%;
            border: 1px solid #444444;
        }

        th, td {
            border: 1px solid #444444;
        }

        .container {
            margin-top: 20px;
        }

        input.ng-invalid {
            border: 2px solid #FFA7A7;
        }
    </style>
    <script type="text/javascript" src="lib/angular-1.7.8/angular.js"></script>
    <script>
        angular.module('form-demo-app', [])
            .controller('mainCtrl', ['$scope', function ($scope) {
            }]);
    </script>
</head>
<body>
<div class="container" id="wrap">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form name="signUpForm" class="form" role="form">
                <br><br>
                <legend>회원가입</legend>
                <h5>회원 정보를 입력해주세요.</h5>
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <input type="text" name="firstname" class="form-control input-lg" ng-model="user.firstName"
                               placeholder="성" ng-required="true" ng-maxlength="4"/>
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <input type="text" name="lastname" class="form-control input-lg" placeholder="이름"
                               ng-model="user.lastName" ng-required="true" ng-minlength="2"/>
                    </div>
                    <div ng-show="signUpForm.firstname.$error.maxlength" class="col-xs-12 col-md-12 alert alert-warning"
                         role="alert">성은 최대 4글자만 입력가능합니다.
                    </div>
                    <div ng-show="signUpForm.lastname.$error.minlength" class="col-xs-12 col-md-12 alert alert-warning"
                         role="alert">이름은 최소 2글자만 입력가능합니다.
                    </div>
                </div>
                <br>
                <input type="text" name="email" class="form-control input-lg" placeholder="Email" ng-model="user.email"
                       ng-required="true"/>
                <br>
                <input type="password" name="password" class="form-control input-lg" placeholder="패스워드"
                       ng-model="user.password" ng-required="true"
                       ng-pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,20}$/"/>
                <div ng-show="signUpForm.password.$error.pattern" class="alert alert-warning" role="alert">최소 4글자, 최대
                    20글자이고 적어도 1나의 소문자, 대문자, 숫자를 포함해야합니다.
                </div>
                <br>
                <input type="password" name="confirm_password" class="form-control input-lg" placeholder="패스워드 재입력"
                       ng-model="user.repassword" ng-required="true"/>
                <br>
                <label>성별 : </label>
                <input type="radio" name="gender" ng-model="user.gender" value="M">남자
                <input type="radio" name="gender" ng-model="user.gender" value="F">여자
                <br>
                <br>
                <table>
                    <tr>
                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit"
                                onclick="location.href='member_insert.php'">회원가입
                        </button>
                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit"
                                onclick="location.href='index.php'">취소
                        </button>
                    </tr>
                </table>
            </form>
            <div>

            </div>
        </div>
    </div>
</div>
</body>
</html>