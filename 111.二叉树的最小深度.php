<?php
/*
 * @lc app=leetcode.cn id=111 lang=php
 *
 * [111] 二叉树的最小深度
 *
 * https://leetcode-cn.com/problems/minimum-depth-of-binary-tree/description/
 *
 * algorithms
 * Easy (47.44%)
 * Likes:    506
 * Dislikes: 0
 * Total Accepted:    218.9K
 * Total Submissions: 459.5K
 * Testcase Example:  '[3,9,20,null,null,15,7]'
 *
 * 给定一个二叉树，找出其最小深度。
 *
 * 最小深度是从根节点到最近叶子节点的最短路径上的节点数量。
 *
 * 说明：叶子节点是指没有子节点的节点。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：root = [3,9,20,null,null,15,7]
 * 输出：2
 *
 *
 * 示例 2：
 *
 *
 * 输入：root = [2,null,3,null,4,null,5,null,6]
 * 输出：5
 *
 *
 *
 *
 * 提示：
 *
 *
 * 树中节点数的范围在 [0, 10^5] 内
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

    /**
     * @param TreeNode $root
     * @return int
     */
    public function minDepth($root)
    {
        if (! $root) {
            return 0;
        }

        if (! $root->left && ! $root->right) {
            return 1;
        } elseif ($root->left && ! $root->right) {
            return $this->minDepth($root->left) + 1;
        } elseif (! $root->left && $root->right) {
            return $this->minDepth($root->right) + 1;
        } else {
            return min($this->minDepth($root->left), $this->minDepth($root->right)) + 1;
        }
    }
}
// @lc code=end
