<?php
$productModel = model("ProductModel");
$reviewModel = model("ReviewModel");
$reviewReplyModel = model("ReviewReplyModel");
$review = $reviewModel->getReview($review_id);
$product = $productModel->find($review['product_id']);
$reply = $reviewReplyModel->where('review_id', $review_id)->get()->getRowArray();
?>
<div class="modal fade" id="model_detail_<?= $review_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết bình luận</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form_<?= $review_id ?>">
                    <input type="hidden" name="review_id" value="<?= $review_id ?>">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <label for="" class="form-label d-block">Người bình luận</label>
                                    <input type="text" value="<?= $review['user_name'] ?>"
                                        class="form-control form-control-sm" disabled>
                                </td>
                                <td>
                                    <label for="" class="form-label d-block">Trạng thái bình luận</label>
                                    <select name="post_status" id="" class="form-select form-select-sm">
                                        <option value="" disabled>Chọn trạng thái bình luận</option>
                                        <?php foreach (REVIEW_STATUS_NAMES as $key => $value) : ?>
                                            <option <?= $review['post_status'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" class="form-label d-block">Số điện thoại</label>
                                    <input id="phone" value="<?= $review['phone'] ?>" type="text"
                                        class="form-control form-control-sm" disabled>
                                </td>
                                <td>
                                    <label for="" class="form-label d-block">Ngày bình luận</label>
                                    <input id="created_at" type="text" value="<?= $review['created_at'] ?>"
                                        class="form-control form-control-sm" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" class="form-label d-block">Mức độ hài lòng</label>
                                    <span><?= $review['star'] ?> sao</span>
                                </td>
                                <td>
                                    <label for="" class="form-label d-block">Sản phẩm</label>
                                    <a href="/product/view/<?= esc($product['slug']); ?>" target="_blank" rel="noopener noreferrer"><?= $product['product_name'] ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="" class="form-label d-block">Nội dung bình luận</label>
                                    <textarea name="review_des" id="" cols="30" rows="5" class="form-control form-control-sm" disabled><?= $review['review_des'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="" class="form-label d-block">Nội dung phản hồi</label>
                                    <textarea name="reply_des" id="" cols="30" rows="5" class="form-control form-control-sm"><?= $reply['reply_des'] ?? '' ?></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal_<?= $review_id ?>">Đóng</button>
                <button type="button" onclick="saveReview(<?= $review_id ?>)" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</div>