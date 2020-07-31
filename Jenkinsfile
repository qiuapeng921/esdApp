pipeline {
  agent {
    docker {
      image 'qiuapeng921/php-swoole'
    }

  }
  stages {
    stage('shell') {
      steps {
        sh 'sh \'echo 11111\''
      }
    }

    stage('print') {
      steps {
        echo '2222'
      }
    }

    stage('end') {
      steps {
        sh 'sh \'echo sucess\''
      }
    }

  }
}