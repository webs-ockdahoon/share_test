pipeline {
    agent any
    triggers {
        pollSCM '* * * * *'
    }
    stages {
        /*************** publish Over SSH Plugin 사용 ******************/
        stage('SSH transfer') {
            steps([$class: 'BapSshPromotionPublisherPlugin']) {
                sshPublisher(
                    continueOnError: false, failOnError: true,
                    publishers: [
                        sshPublisherDesc(
                            configName: "webs88",
                            verbose: true,
                            transfers: [
                                sshTransfer(
                                    sourceFiles: "**", //전송할 파일
                                    removePrefix: "", //파일에서 삭제할 경로가 있다면 작성
                                    remoteDirectory: "/damc/www", //배포할 위치
                                    execCommand: "ls -al /home/webs/damc/www" //원격지에서 실행할 커맨드
                                )
                            ]
                        )
                    ]
                )
            }
        }
    }
    post {
        success {
            slackSend (channel: '#ci-cd', color: '#00FF00', message: "SUCCESSFUL: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]' (${env.BUILD_URL})")
        }
        failure {
            slackSend (channel: '#ci-cd', color: '#FF0000', message: "FAILED: Job '${env.JOB_NAME} [${env.BUILD_NUMBER}]' (${env.BUILD_URL})")
        }
    }
}

