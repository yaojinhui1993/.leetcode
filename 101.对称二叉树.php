<?php
/*
 * @lc app=leetcode.cn id=101 lang=php
 *
 * [101] 对称二叉树
 *
 * https://leetcode-cn.com/problems/symmetric-tree/description/
 *
 * algorithms
 * Easy (54.70%)
 * Likes:    1378
 * Dislikes: 0
 * Total Accepted:    322.8K
 * Total Submissions: 587.9K
 * Testcase Example:  '[1,2,2,3,4,4,3]'
 *
 * 给定一个二叉树，检查它是否是镜像对称的。
 *
 *
 *
 * 例如，二叉树 [1,2,2,3,4,4,3] 是对称的。
 *
 * ⁠   1
 * ⁠  / \
 * ⁠ 2   2
 * ⁠/ \ / \
 * 3  4 4  3
 *
 *
 *
 *
 * 但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的:
 *
 * ⁠   1
 * ⁠  / \
 * ⁠ 2   2
 * ⁠  \   \
 * ⁠  3    3
 *
 *
 *
 *
 * 进阶：
 *
 * 你可以运用递归和迭代两种方法解决这个问题吗？
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
    public function isSymmetric($root)
    {
        // // 左边不等于右边，返回 false
        // if (! ! $root->left ===  ! ! $root->right) {

        //     // 继续判断
        //     if ($root->left) {
        //         if ($root->left->val !== $root->right->val) {
        //             var_dump($root->left->val, $root->right->val);
        //             return false;
        //         }

        //         return $this->isSymmetric($root->left) && $this->isSymmetric($root->right);
        //     } else {
        //         return true;
        //     }
        // } else {
        //     // 不同步
        //     return false;
        // }
        return $this->checkLayerIsInvalid([$root]);
    }

    public function checkLayerIsInvalid(array $roots)
    {
        $layer = count($roots);

        // var_dump($layer);
        // var_dump('roots. ', $roots);

        // 遍历旧有的数据
        // for ($i = 0, $j = $layer; $i <= $j; $i++, $j--) {

        //     if (! ! $roots[$i] !== ! ! $roots[$j]) {
        //         var_dump('here');
        //         return false;
        //     }
        //     if ($roots[$i] && $roots[$j]) {
        //         // 两边不相等，返回 false
        //         if ($roots[$i]->val !== $roots[$j]->val) {
        //             // var_dump($roots[$i]->val, $roots[$j]->val);
        //             return false;
        //         }
        //     }
        // }

        $val = [];

        // 获取所有的数据
        for ($i = 0 ; $i < $layer; $i++) {
            $val[] = $roots[$i] ? $roots[$i]->val : null;
        }


        // [2,3,3,4,5,5,4,null,null,8,9,9,8]
        // [1,2,2,null,3,null,3]
        // [1,2,2,3,4,4,3]


        for ($i = 0, $j = count($val) - 1; $i <= $j; $i++, $j--) {
            if ($val[$i] !== $val[$j]) {
                return false;
            }
        }



        // var_dump($childrenCount, $layer);


        $children = [];

        $flag = 1; // 0, 不是全部都为 null, 1 全部都为 null

        for ($i = 0; $i < $layer; $i++) {
            $children[] = $roots[$i]->left;
            $children[] = $roots[$i]->right;

            if (! ! $roots[$i]->left || ! ! $roots[$i]->right) {
                $flag = 0;
            }
        }

        // var_dump($children, $layer, 2 ** $layer);

        if ($flag === 1) {
            // var_dump($children);
            return true;
        }

        // var_dump('children count. ' . $childrenCount);

        // var_dump('children. ', $children);

        // 检查下一层
        return $this->checkLayerIsInvalid($children);
    }
}
// @lc code=end
