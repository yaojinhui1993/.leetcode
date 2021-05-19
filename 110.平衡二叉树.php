<?php
/*
 * @lc app=leetcode.cn id=110 lang=php
 *
 * [110] 平衡二叉树
 *
 * https://leetcode-cn.com/problems/balanced-binary-tree/description/
 *
 * algorithms
 * Easy (55.63%)
 * Likes:    685
 * Dislikes: 0
 * Total Accepted:    209K
 * Total Submissions: 375K
 * Testcase Example:  '[3,9,20,null,null,15,7]'
 *
 * 给定一个二叉树，判断它是否是高度平衡的二叉树。
 *
 * 本题中，一棵高度平衡二叉树定义为：
 *
 *
 * 一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过 1 。
 *
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：root = [3,9,20,null,null,15,7]
 * 输出：true
 *
 *
 * 示例 2：
 *
 *
 * 输入：root = [1,2,2,3,3,null,null,4,4]
 * 输出：false
 *
 *
 * 示例 3：
 *
 *
 * 输入：root = []
 * 输出：true
 *
 *
 *
 *
 * 提示：
 *
 *
 * 树中的节点数在范围 [0, 5000] 内
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
     * @param TreeNode $root
     * @return Boolean
     */
    public function isBalanced($root)
    {
        // [1,2,2,3,3,null,null,4,4]
        // [1,2,2,3,null,null,3,4,null,null,4]
        // [1,null,2,null,3]

        if (! $root) {
            return true;
        }


        $leftDepth = $this->maxDepth($root->left);


        $rightDepth = $this->maxDepth($root->right);

        // var_dump($leftDepth, $rightDepth);

        // 1. 判断左右边两棵子树的高度。
        // 2. 如果有必要的话，继续判断子树的子树的左右两边的高度
        return abs($leftDepth - $rightDepth) <= 1 && $this->isBalanced($root->left) && $this->isBalanced($root->right);
    }

    protected function maxDepth($root)
    {
        if (! $root) {
            return -1;
        }

        return $this->getChildrenDepth([$root]);
    }

    protected function getChildrenDepth($roots)
    {
        $rootCount = count($roots);

        $children = [];


        for ($i = 0; $i < $rootCount; $i++) {
            if ($roots[$i]) {
                if ($roots[$i]->left) {
                    $children[] = $roots[$i]->left;
                }
                if ($roots[$i]->right) {
                    $children[] = $roots[$i]->right;
                }

                // if ($roots[$i]->val === 3) {
                    // var_dump($roots[$i]);
                // }
            }
        }

        $flag = 1;  // 标记, 0 不是全部都为 null, 1 全部都为 null

        for ($i = 0; $i < count($children); $i++) {
            if ($children[$i]) {
                $flag = 0;
                break;
            }
        }

        if ($flag === 0) {
            return $this->getChildrenDepth($children) + 1;
        } else {
            return 0;
        }
    }
}
// @lc code=end
