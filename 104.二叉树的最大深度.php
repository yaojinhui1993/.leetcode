<?php
/*
 * @lc app=leetcode.cn id=104 lang=php
 *
 * [104] 二叉树的最大深度
 *
 * https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/description/
 *
 * algorithms
 * Easy (76.08%)
 * Likes:    878
 * Dislikes: 0
 * Total Accepted:    416K
 * Total Submissions: 546.2K
 * Testcase Example:  '[3,9,20,null,null,15,7]'
 *
 * 给定一个二叉树，找出其最大深度。
 *
 * 二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。
 *
 * 说明: 叶子节点是指没有子节点的节点。
 *
 * 示例：
 * 给定二叉树 [3,9,20,null,null,15,7]，
 *
 * ⁠   3
 * ⁠  / \
 * ⁠ 9  20
 * ⁠   /  \
 * ⁠  15   7
 *
 * 返回它的最大深度 3 。
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
    protected $depth = 1;

    /**
     * @param TreeNode $root
     * @return int
     */
    public function maxDepth($root)
    {
        // 获取子元素
        if (! $root) {
            return 0;
        }

        return $this->getChildren([$root]);

        // 查看是都已经为空了。如果不是，则说明该继续遍历
    }

    protected function getChildren($roots)
    {
        $rootCount = count($roots);

        $children = [];

        for ($i = 0; $i < $rootCount; $i++) {
            if ($roots[$i]) {
                $children[] = $roots[$i]->left;
                $children[] = $roots[$i]->right;
            } else {
                $children[] = null;
                $children[] = null;
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
            $this->depth ++;

            return $this->getChildren($children);
        } else {
            return $this->depth;
        }
    }
}
// @lc code=end
