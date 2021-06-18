<?php
/*
 * @lc app=leetcode.cn id=145 lang=php
 *
 * [145] 二叉树的后序遍历
 *
 * https://leetcode-cn.com/problems/binary-tree-postorder-traversal/description/
 *
 * algorithms
 * Easy (74.58%)
 * Likes:    609
 * Dislikes: 0
 * Total Accepted:    243.9K
 * Total Submissions: 327K
 * Testcase Example:  '[1,null,2,3]'
 *
 * 给定一个二叉树，返回它的 后序 遍历。
 *
 * 示例:
 *
 * 输入: [1,null,2,3]
 * ⁠  1
 * ⁠   \
 * ⁠    2
 * ⁠   /
 * ⁠  3
 *
 * 输出: [3,2,1]
 *
 * 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
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
     * @param TreeNode $root
     * @return int[]
     */
    public function postorderTraversal($root)
    {
        $orders = [];

        if ($root->left) {
            $orders = array_merge($orders, $this->postorderTraversal($root->left));
        }


        if ($root->right) {
            $orders = array_merge($orders, $this->postorderTraversal($root->right));
        }

        $orders[] = $root->val;

        return $orders;
    }
}
// @lc code=end
