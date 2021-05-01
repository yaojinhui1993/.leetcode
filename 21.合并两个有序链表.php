<?php
/*
 * @lc app=leetcode.cn id=21 lang=php
 *
 * [21] 合并两个有序链表
 *
 * https://leetcode-cn.com/problems/merge-two-sorted-lists/description/
 *
 * algorithms
 * Easy (65.89%)
 * Likes:    1689
 * Dislikes: 0
 * Total Accepted:    553.8K
 * Total Submissions: 840.3K
 * Testcase Example:  '[1,2,4]\n[1,3,4]'
 *
 * 将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：l1 = [1,2,4], l2 = [1,3,4]
 * 输出：[1,1,2,3,4,4]
 *
 *
 * 示例 2：
 *
 *
 * 输入：l1 = [], l2 = []
 * 输出：[]
 *
 *
 * 示例 3：
 *
 *
 * 输入：l1 = [], l2 = [0]
 * 输出：[0]
 *
 *
 *
 *
 * 提示：
 *
 *
 * 两个链表的节点数目范围是 [0, 50]
 * -100
 * l1 和 l2 均按 非递减顺序 排列
 *
 *
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function mergeTwoLists($l1, $l2)
    {
        if ($l1 === null) {
            return $l2 === null ? [] : $l2;
        }

        if ($l2 === null) {
            return $l1 === null ? [] : $l1;
        }


        $a = null;
        $p = null;


        while ($l1 !== null && $l2 !== null) {
            while ($l2 !== null) {
                // 相等的情况, 放入 l1, l2
                if ($l1->val === $l2->val) {
                    if ($a === null) {
                        $a = $p = new ListNode($l1->val);
                        $a->next = new ListNode($l2->val);
                        $a = $a->next;
                    } else {
                        $a->next = new ListNode($l1->val);
                        $a = $a->next;
                        $a->next = new ListNode($l2->val);
                        $a = $a->next;
                    }

                    $l1 = $l1->next;
                    $l2 = $l2->next;
                    break;
                }

                // l1 大于 l2, 放入 l2, 继续循环 l2
                if ($l1->val > $l2->val) {
                    if ($a === null) {
                        $a = $p = new ListNode($l2->val);
                    } else {
                        $a->next = new ListNode($l2->val);
                        $a = $a->next;
                    }

                    $l2 = $l2->next;
                    continue;
                }

                // l1 小于 l2, 放入 l1, 循环 l1
                if ($l1->val < $l2->val) {
                    if ($a === null) {
                        $a = $p = new ListNode($l1->val);
                    } else {
                        $a->next = new ListNode($l1->val);
                        $a = $a->next;
                    }
                    $l1 = $l1->next;

                    break;
                }
            }
        }

        if ($l1 !== null) {
            $a->next =  $l1;
        }

        if ($l2 !== null) {
            $a->next = $l2;
        }


        return $p;
    }
}
// @lc code=end
