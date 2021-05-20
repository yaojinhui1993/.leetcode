<?php
/*
 * @lc app=leetcode.cn id=112 lang=php
 *
 * [112] 路径总和
 *
 * https://leetcode-cn.com/problems/path-sum/description/
 *
 * algorithms
 * Easy (52.12%)
 * Likes:    580
 * Dislikes: 0
 * Total Accepted:    209.3K
 * Total Submissions: 400.8K
 * Testcase Example:  '[5,4,8,11,null,13,4,7,2,null,null,null,1]\n22'
 *
 * 给你二叉树的根节点 root 和一个表示目标和的整数 targetSum ，判断该树中是否存在 根节点到叶子节点
 * 的路径，这条路径上所有节点值相加等于目标和 targetSum 。
 *
 * 叶子节点 是指没有子节点的节点。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：root = [5,4,8,11,null,13,4,7,2,null,null,null,1], targetSum = 22
 * 输出：true
 *
 *
 * 示例 2：
 *
 *
 * 输入：root = [1,2,3], targetSum = 5
 * 输出：false
 *
 *
 * 示例 3：
 *
 *
 * 输入：root = [1,2], targetSum = 0
 * 输出：false
 *
 *
 *
 *
 * 提示：
 *
 *
 * 树中节点的数目在范围 [0, 5000] 内
 * -1000
 * -1000
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
    protected $isFirst = true;
    /**
     * @param TreeNode $root
     * @param Int $targetSum
     * @return Boolean
     */
    public function hasPathSum($root, $targetSum)
    {

        // [1, 2]
        // 1
        // false

        // [1,-2,-3,1,3,-2,null,-1]
        // -1
        // true


        // [5,4,8,11,null,13,4,7,2,null,null,null,1]
        // 22
        // false


        // [1,2,null,3,null,4,null,5]
        // 6
        // true


        if (! $root) {
            return false;
        }

        if ($root->val === $targetSum && ! $root->left && ! $root->right) {
            return true;
        }

        // if ($this->isFirst) {
        //     $this->isFirst = false;
        // }

        if ($this->hasPathSum($root->left, $targetSum - $root->val)) {
            return true;
        } elseif ($this->hasPathSum($root->right, $targetSum - $root->val)) {
            return true;
        }


        return false;
    }
}
// @lc code=end
