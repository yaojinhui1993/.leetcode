<?php
/*
 * @lc app=leetcode.cn id=108 lang=php
 *
 * [108] 将有序数组转换为二叉搜索树
 *
 * https://leetcode-cn.com/problems/convert-sorted-array-to-binary-search-tree/description/
 *
 * algorithms
 * Easy (75.20%)
 * Likes:    764
 * Dislikes: 0
 * Total Accepted:    159.2K
 * Total Submissions: 211.5K
 * Testcase Example:  '[-10,-3,0,5,9]'
 *
 * 给你一个整数数组 nums ，其中元素已经按 升序 排列，请你将其转换为一棵 高度平衡 二叉搜索树。
 *
 * 高度平衡 二叉树是一棵满足「每个节点的左右两个子树的高度差的绝对值不超过 1 」的二叉树。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：nums = [-10,-3,0,5,9]
 * 输出：[0,-3,9,-10,null,5]
 * 解释：[0,-10,5,null,-3,null,9] 也将被视为正确答案：
 *
 *
 *
 * 示例 2：
 *
 *
 * 输入：nums = [1,3]
 * 输出：[3,1]
 * 解释：[1,3] 和 [3,1] 都是高度平衡二叉搜索树。
 *
 *
 *
 *
 * 提示：
 *
 *
 * 1
 * -10^4
 * nums 按 严格递增 顺序排列
 *
 *
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param int[] $nums
     * @return TreeNode
     */
    public function sortedArrayToBST($nums)
    {
        // 排好序
        $count = count($nums);

        // if ($count === 0) {
        //     return null;
        // }

        $pos = intval(ceil($count / 2));

        // var_dump($pos, $count, $nums[$pos - 1], array_slice($nums, 0, $pos - 1), array_slice($nums, $pos, $count));
        // die();

        $leftArray = array_slice($nums, 0, $pos - 1);
        $rightArray = array_slice($nums, $pos, $count);

        $treeNode = new TreeNode(
            $nums[$pos - 1],
            empty($leftArray)  ? null : $this->sortedArrayToBST($leftArray),
            empty($rightArray)  ? null : $this->sortedArrayToBST($rightArray)
        );

        // var_dump($treeNode);

        // 转化成 TreeNode
        return $treeNode;
    }
}
// @lc code=end
