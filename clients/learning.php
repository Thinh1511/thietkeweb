<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /auth/login.php");
    exit();
}


require_once "../base/config.php";

$user = getUserLogin();

$sql = "SELECT * FROM learning_materials WHERE status = 'ACTIVE' ORDER BY order_in_course ASC";
$result = $con->query($sql);

$selected_material_id = isset($_GET['material_id']) ? intval($_GET['material_id']) : 0;
$material = null;

if ($selected_material_id > 0) {
    $stmt = $con->prepare("SELECT * FROM learning_materials WHERE id = ?");
    $stmt->bind_param("i", $selected_material_id);
    $stmt->execute();
    $material = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài học</title>

    <?php include '../include/client/head.php'; ?>
</head>

<body class="bg-light">

<?php include '../include/client/header.php'; ?>

<main class="container mt-4">
    <div class="row">
        <!-- Danh sách bài học -->
        <aside class="col-lg-4 mb-4">
            <h2 class="h3 fw-bold text-dark mb-4">Danh sách bài học</h2>
            <ul class="list-unstyled">
                <?php
                $result->data_seek(0); // Reset result pointer
                while ($row = $result->fetch_assoc()) {
                    echo '<li>';
                    $select = '';
                    if ($selected_material_id == $row['id']) {
                        $select = 'bg-primary text-white bg-opacity-50';
                    } else {
                        $select = 'bg-light';
                    }
                    echo '<a href="?material_id=' . htmlspecialchars($row['id']) . '" class="d-block p-3 ' . $select . ' rounded shadow-sm text-dark text-decoration-none mb-3 hover-link">' . htmlspecialchars($row['title']) . '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </aside>

        <!-- Nội dung bài học -->
        <section class="col-lg-8">
            <?php if ($material): ?>
                <h2 class="h3 fw-bold text-dark mb-4"><?php echo htmlspecialchars($material['title']); ?></h2>
                <div class="mb-4">
                    <!-- Video -->
                    <?php if (!empty($material['video_url'])): ?>
                        <div class="ratio ratio-16x9 mb-4">
                            <!-- Video iframe -->
                            <div id="video-placeholder"></div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="bg-light p-4 rounded shadow-sm">
                    <h3 class="h4 text-dark mb-4">Kiến thức</h3>
                    <p class="text-muted"><?php echo nl2br(htmlspecialchars(strip_tags($material['content']))); ?></p>
                </div>
            <?php else: ?>
                <p class="text-muted">Chọn một bài học từ danh sách để xem chi tiết.</p>
            <?php endif; ?>
        </section>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal"
            id="launch_modal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hoàn thành khoá học</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Chúc mừng bạn đã vượt qua bài học này!</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="confirmNextCourse();">Bài học
                        tiếp theo
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php include '../include/client/header.php'; ?>

    <?php include '../include/client/footer.php'; ?>
    <?php include '../include/client/script.php'; ?>

    <script>
        let tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        let firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        let player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('video-placeholder', {
                height: '600',
                width: '935',
                videoId: '<?= $material['video_id'] ?>',
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.PLAYING) {
                startCourse();
            }
            if (event.data === YT.PlayerState.ENDED) {
                completeCourse();
            }
        }

        async function completeCourse() {
            let api = '../../clients/action/update_learn.php';

            await addCourse(api);

            autoNextCourse();
        }

        async function startCourse() {
            let api = '../../clients/action/start_learn.php';

            await addCourse(api);
        }

        async function addCourse(api) {
            const postData = {
                course_id: '<?= $material['id'] ?>',
            };

            let formData = new FormData();
            formData.append('course_id', <?= $material['id'] ?>);

            await $.ajax({
                url: api,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                error: function (request, status, error) {
                    console.log("code : " + request.status + "\r\nmessage : " + request.responseText);
                },
                success: function (response, status, request) {
                    response = response.trim();
                    if (response === 'success') {
                        console.log('success');
                    } else if (response === 'ok') {
                        console.log('ok')
                    } else if (response === 'error') {
                        console.log('error');
                    }
                }
            });
        }

        function autoNextCourse() {
            $('#launch_modal').click();
        }

        function confirmNextCourse() {
            let current_ = $('a[href="?material_id=<?= $material['id'] ?>"]');

            if (current_.length > 0) {
                let next_ = $(current_).parent().next();
                let next_data = next_.find('a').attr('href');

                if (next_data !== undefined) {
                    window.location.href = '../../clients/learning.php' + next_data;
                }
            }
        }
    </script>
</body>

</html>
