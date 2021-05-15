<?php
/*
 * @lc app=leetcode.cn id=100 lang=php
 *
 * [100] 相同的树
 *
 * https://leetcode-cn.com/problems/same-tree/description/
 *
 * algorithms
 * Easy (60.44%)
 * Likes:    616
 * Dislikes: 0
 * Total Accepted:    203.8K
 * Total Submissions: 337.2K
 * Testcase Example:  '[1,2,3]\n[1,2,3]'
 *
 * 给你两棵二叉树的根节点 p 和 q ，编写一个函数来检验这两棵树是否相同。
 *
 * 如果两个树在结构上相同，并且节点具有相同的值，则认为它们是相同的。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：p = [1,2,3], q = [1,2,3]
 * 输出：true
 * [1,2,3]\n[1,2,3]\n
 *
 *
 * 示例 2：
 *
 *
 * 输入：p = [1,2], q = [1,null,2]
 * 输出：false
 *
 *
 * 示例 3：
 *
 *
 * 输入：p = [1,2,1], q = [1,1,2]
 * 输出：false
 *
 *
 *
 *
 * 提示：
 *
 *
 * 两棵树上的节点数目都在范围 [0, 100] 内
 * -10^4
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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    public function isSameTree($p, $q)
    {
        // 值相等
        if ($p->val === $q->val) {
            // 存在左节点的值, 继续
            if (! ! $p->left !== ! ! $q->left) {
                return false;
            }

            if (! ! $p->right !== ! ! $q->right) {
                return false;
            }

            if ($p->left || $p->right) {
                // 判断左右节点是否相等
                return $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
            }

            return true;
        } else {
            // 值不相等
            return false;
        }
    }
}
// @lc code=end
